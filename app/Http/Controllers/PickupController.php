<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Location;
use App\Models\Pickup;
use App\Models\PickupLog;
use App\Models\State;
use App\Models\User;
use App\Notifications\NewPickup;
use App\Notifications\NewPickupCustomer;
use App\Notifications\UpdatedPickup;
use App\Traits\AjaxSelect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PickupController extends Controller
{
    use AjaxSelect;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pickups    = Pickup::orderBy('updated_at','desc');
        $locations  = Location::orderBy('updated_at','desc');

        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $pickups    = $pickups->where('business_user_id', $user->id);
            $locations  = $locations->where('business_user_id',$user->id);
        }
        if($user->hasRole('operation courier'))
        {
            $pickups    = Pickup::whereHas("courier", function($q){ $q->where("courier_id", auth()->user()->id); });
        }

        if(request()->pickup_id)
        {
            $pickups = $pickups->where('pickup_id', request()->pickup_id);
        }
        if(request()->status)
        {
            $pickups = $pickups->where('status', request()->status);
        }
        if(request()->location)
        {
            $pickups = $pickups->where('location_id', request()->location);
        }
        if(request()->type)
        {
            $pickups = $pickups->where('type', request()->type);
        }
        $pickups    = $pickups->get();
        $status     = ['Created','Out for pickup','Picked up'];
        $locations  = $locations->get();
        return view('pickups.index',compact('pickups','status','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(auth()->user()->id);
        $locations = Location::orderBy('updated_at','desc');
        $contacts  = Contact::orderBy('updated_at','desc');
        if($user->hasRole('customer'))
        {
            $locations  = $locations->where('business_user_id',$user->id);
            $contacts   = $contacts->where('business_user_id',$user->id);
        }
        $locations  = $locations->get();
        $contacts   = $contacts->get();
        $countries  = Country::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        return view('pickups.create',compact('locations','contacts','countries','states','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['pickup_id'] = random_int(100000, 999999);
        $request['status'] = 'Created';
        $this->validate($request, Pickup::rules());

        if($request->location_in == null)
        {
            $this->validate($request, Location::rules());
            $location = Location::create([
                'name'                  => $request->name,
                'street'                => $request->street,
                'building'              => $request->building,
                'floor'                 => $request->floor,
                'apartment'             => $request->apartment,
                'landmarks'             => $request->landmarks,
                'country_id'            => $request->country_id,
                'state_id'              => $request->state_id,
                'city_id'               => $request->city_id,
                'business_user_id'      => auth()->user()->id,
            ]);
        }

        if($request->contact_in == null)
        {
            $this->validate($request, Contact::rules());
            $contact = Contact::create([
                'contact_name'                  => $request->contact_name,
                'contact_job_title'             => $request->contact_job_title,
                'contact_email'                 => $request->contact_email,
                'contact_phone'                 => $request->contact_phone,
                'business_user_id'              => auth()->user()->id,
            ]);
        }
        $pickup = Pickup::create([
            'pickup_id'             => $request->pickup_id,
            'type'                  => ($request->date_in == null) ? $request->type:'One Time',
            'scheduled_date'        => $request->scheduled_date,
            'start_date'            => $request->start_date,
            'status'                => $request->status,
            'repeat_days'           => $request->repeat_days,
            'notes'                 => $request->notes,
            'contact_id'            => ($request->contact_in == null) ? $contact->id:$request->contact_id,
            'location_id'           => ($request->location_in == null) ? $location->id:$request->location_id,
            'business_user_id'      => auth()->user()->id,
        ]);

        $pickup->log()->create([
            'status'                 => 'Created',
            'description'            => 'It is expected to pickup your order at pickup date.',
        ]);

        $pickup->customerlog()->create([
            'status'                 => 'Created',
            'description'            => 'It is expected to pickup your order at pickup date.',
        ]);

        $users = User::whereHas("roles", function($q){
            $q->where("name", "Super Admin")
                ->orWhere("name", "admin")
                ->orWhere("name", "sales")
                ->orWhere("name", "operation logistics")
                ->orWhere("name", "operation admin");
        })->get();
        $nuser = User::find(auth()->user()->id);
        $nuser->notify(new NewPickupCustomer($pickup));
        Notification::send($users, new NewPickup($pickup));

        return redirect()->route('dashboard.pickups.show',$pickup->id)->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function show(Pickup $pickup)
    {
        if(!$pickup->customerlog()->count())
        {
            $pickup->customerlog()->create([
                'status'                 => 'Created',
                'description'            => 'It is expected to pickup your order at pickup date.',
            ]);
        }

        $qr     = QrCode::generate(route('dashboard.pickups.create.qr',$pickup->id));
        $user   = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $log            = $pickup->customerlog()->orderByDesc('updated_at')->first();
            if($log->status != 'New'){
                $no_edit = 1;
            }
            $customerlog = '';
        }else{
            $log            = $pickup->log()->orderByDesc('updated_at')->first();
            $customerlog    = $pickup->customerlog()->orderByDesc('updated_at')->first();
        }


        $logs  = [
            0 => [
                'type' => 'Created',
                'icon' => 'new_releases',
            ],
            1 => [
                'type' => 'Out for pickup',
                'icon' => 'local_shipping',
            ],
            2 => [
                'type' => 'Picked up',
                'icon' => 'check',
            ],
        ];

        return view('pickups.show',compact('pickup','logs','qr','log','customerlog'));
    }

    public function qr(Pickup $pickup)
    {
        $user = User::find(auth()->user()->id);
        if($user->hasRole('operation courier'))
        {
            $pickupLog  = PickupLog::create([
                'status'                 => 'Picked up',
                'description'            => 'Your order has been picked up and is expected to be delivered to customer soon.',
                'pickup_id'              => $pickup->id,
            ]);
        }
        return redirect()->route('dashboard.pickups.show',$pickup->id)->with('success','Data updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function edit(Pickup $pickup)
    {
        $user = User::find(auth()->user()->id);
        $locations = Location::orderBy('updated_at','desc');
        $contacts  = Contact::orderBy('updated_at','desc');
        if($user->hasRole('customer'))
        {
            $locations  = $locations->where('business_user_id',$user->id);
            $contacts   = $contacts->where('business_user_id',$user->id);
        }
        $locations  = $locations->get();
        $contacts   = $contacts->get();
        $countries  = Country::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        return view('pickups.edit',compact('pickup','locations','contacts','countries','states','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pickup $pickup)
    {
        $this->validate($request, Pickup::rules($update = true, $pickup->id));

        if($request->location_id == null)
        {
            $this->validate($request, Location::rules());
            $location = Location::create([
                'name'                  => $request->name,
                'street'                => $request->street,
                'building'              => $request->building,
                'floor'                 => $request->floor,
                'apartment'             => $request->apartment,
                'landmarks'             => $request->landmarks,
                'country_id'            => $request->country_id,
                'state_id'              => $request->state_id,
                'city_id'               => $request->city_id,
                'business_user_id'      => auth()->user()->id,
            ]);
        }

        if($request->contact_id == null)
        {
            $this->validate($request, Contact::rules());
            $contact = Contact::create([
                'contact_name'                  => $request->contact_name,
                'contact_job_title'             => $request->contact_job_title,
                'contact_email'                 => $request->contact_email,
                'contact_phone'                 => $request->contact_phone,
                'business_user_id'              => auth()->user()->id,
            ]);
        }
        $pickup->update([
            'pickup_id'             => $request->pickup_id,
            'type'                  => ($request->date_in == null) ? $request->type:'One Time',
            'scheduled_date'        => $request->scheduled_date,
            'start_date'            => $request->start_date,
            'status'                => $request->status,
            'repeat_days'           => $request->repeat_days,
            'notes'                 => $request->notes,
            'contact_id'            => ($request->contact_id == null) ? $contact->id:$request->contact_id,
            'location_id'           => ($request->location_id == null) ? $location->id:$request->location_id,
            'business_user_id'      => auth()->user()->id,
        ]);

        $users = User::whereHas("roles", function($q){
            $q->where("name", "Super Admin")
                ->orWhere("name", "admin")
                ->orWhere("name", "sales")
                ->orWhere("name", "operation logistics")
                ->orWhere("name", "operation admin");
        })->get();
        $user = User::find(auth()->user()->id);
        Notification::send($users, new UpdatedPickup($pickup));
        $user->notify(new UpdatedPickup($pickup));

        return redirect()->route('dashboard.pickups.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pickup $pickup)
    {
        Pickup::destroy($pickup->id);
        return redirect()->route('dashboard.pickups.index')->with('success','Data deleted successfully');
    }
}
