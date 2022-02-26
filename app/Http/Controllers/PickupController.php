<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Location;
use App\Models\Pickup;
use App\Models\State;
use App\Traits\AjaxSelect;
use Illuminate\Http\Request;

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
        $pickups = Pickup::orderBy('updated_at','desc');

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
        $status     = ['Created','Out for pickup'];
        $locations  = Location::all();
        return view('pickups.index',compact('pickups','status','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations  = Location::all();
        $contacts   = Contact::all();
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
                'business_user_id'      => auth()->user()->id,
            ]);
        }

        $pickup = Pickup::create([
            'pickup_id'             => $request->pickup_id,
            'type'                  => ($request->date_in == null) ? $request->type:'One Time',
            'scheduled_date'        => $request->scheduled_date,
            'start_date'            => $request->start_date,
            'status'                => $request->status,
            'notes'                 => $request->notes,
            'contact_id'            => ($request->contact_in == null) ? $contact->id:$request->contact_id,
            'location_id'           => ($request->location_in = null) ? $location:$request->location_id,
            'business_user_id'      => auth()->user()->id,
        ]);

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
        $locations  = Location::all();
        $contacts   = Contact::all();
        $countries  = Country::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        return view('pickups.edit',compact('pickup','locations','contacts','countries','states','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function edit(Pickup $pickup)
    {
        $locations  = Location::all();
        $contacts   = Contact::all();
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

        $pickup->update([
            'pickup_id'             => $request->pickup_id,
            'type'                  => $request->type,
            'scheduled_date'        => $request->scheduled_date,
            'status'                => $request->status,
            'notes'                 => $request->notes,
            'contact_id'            => $request->contact_id,
            'location_id'           => $request->location_id,
        ]);

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
