<?php

namespace App\Http\Controllers\ManageUsers;

use App\Http\Controllers\Helpers\UserHelperController;
use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Location;
use App\Models\State;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $customers = Customer::where('business_user_id',auth()->user()->id)
                ->orderBy('updated_at','desc')
                ->get();
            $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Customer'],['status','active']])
                ->orderBy('updated_at','desc')
                ->get();
        }else{
            $customers = Customer::orderBy('updated_at','desc')
                ->get();
            /*$customers = User::where(function ($query) {
                $query->whereHas('roles', function ($query) {
                    $query->whereIn('name',['customer']);
                });
            });
            dd($customers);*/
            $categories = UserCategory::orderBy('updated_at','desc')
                ->get();
        }

        return view('users.customers.index',compact('customers','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Customer'],['status','active']])->get();
        $currencies = Currency::where('business_user_id',auth()->user()->id)->get();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        return view('users.customers.create',compact('currencies','categories','countries','cities','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['password' => 123456789]);
        $request->request->add(['password_confirmation' => 123456789]);
        $request->request->add(['payment' => 'cash']);
        $this->validate($request, User::rules());
        $this->validate($request, Customer::rules());
        $data                   = $request->all();
        $data['password']       = Hash::make($request->password);
        $data['other_email']    = null;
        $data['religion']       = null;
        $data['secondary_phone']= $request->other_phone;

        if($request->status == 'on')
        {
            $request['status']            = 'active';
        }else{
            $request['status']            = 'inactive';
        }
        try {
            \DB::transaction(function () use($data, $request) {
                $userhelperController = new UserHelperController();
                $user = $userhelperController->createuser($data);

                $customer = Customer::create([
                    'user_id'                   => $user->id,
                    'fax'                       => $request->fax,
                    'status'                    => $request->status,
                    'user_category_id'          => $request->user_category_id,
                    'currency_id'               => $request->currency_id,
                    'note'                      => $request->note,
                    'payment'                   => $request->payment,
                    'business_user_id'          => auth()->user()->id,
                ]);

                if($request->contact_name){
                    for($i=0;$i < count($request->contact_name);$i++){
                        $customer->contact()->create([
                            'contact_name'          => $request->contact_name[$i],
                            'contact_job_title'     => $request->contact_job_title[$i],
                            'contact_email'         => $request->contact_email[$i],
                            'contact_phone'         => $request->contact_phone[$i],
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }
                }

                if($request->street){
                    for($j=0;$j < count($request->street);$j++){
                        $customer->location()->create([
                            'name'                  => $request->location_name[$j],
                            'street'                => $request->street[$j],
                            'building'              => $request->building[$j],
                            'floor'                 => $request->floor[$j],
                            'apartment'             => $request->apartment[$j],
                            'landmarks'             => $request->landmarks[$j],
                            'country_id'            => $request->country_id[$j],
                            'state_id'              => $request->state_id[$j],
                            'city_id'               => $request->city_id[$j],
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }
                }

                if(request()->hasFile('avatar'))
                {
                    $avatar = request()->file('avatar')->getClientOriginalName();
                    request()->file('avatar')->storeAs('/', "/users/{$user->id}/{$avatar}", '');
                    $user->update(['avatar' =>  $avatar]);
                }
                $user->assignRole('customer');
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

        return redirect()->route('dashboard.customers.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Customer'],['status','active']])->get();
        $currencies = Currency::where('business_user_id',auth()->user()->id)->get();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        return view('users.customers.show',compact('customer','categories','currencies','cities','states','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Customer'],['status','active']])->get();
        $currencies = Currency::where('business_user_id',auth()->user()->id)->get();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        $locations  = Location::where('customer_id',$customer->id)->get();
        return view('users.customers.edit',compact('customer','categories','currencies','cities','states','countries','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $data['secondary_phone']= $request->other_phone;
        $this->validate($request, Customer::rules($update = true, $customer->id));
        $this->validate($request, User::rules($update = true, $customer->user_id));
        $data                   = $request->all();
        try {
            \DB::transaction(function () use($data, $request, $customer) {
                $userhelperController = new UserHelperController();
                $user = $userhelperController->updateuser($data, $customer->user_id);

                $customer->update([
                    'user_id'                   => $user->id,
                    'fax'                       => $request->fax,
                    'status'                    => $request->status,
                    'user_category_id'          => $request->user_category_id,
                    'currency_id'               => $request->currency_id,
                    'note'                      => $request->note,
                    'payment'                   => $request->payment,
                    'business_user_id'          => auth()->user()->id,
                ]);

                if($request->contact_name){
                    for($i=0;$i < $request->contact_name;$i++){
                        $customer->contact()->update([
                            'contact_name'          => $request->contact_name[$i],
                            'contact_job_title'     => $request->contact_job_title[$i],
                            'contact_email'         => $request->contact_email[$i],
                            'contact_phone'         => $request->contact_phone[$i],
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }
                }

                if($request->street)
                {
                    for($j=0;$j < $request->street;$j++){
                        $user->location()->update([
                            'name'                  => $request->location_name[$j],
                            'street'                => $request->street[$j],
                            'building'              => $request->building[$j],
                            'floor'                 => $request->floor[$j],
                            'apartment'             => $request->apartment[$j],
                            'landmarks'             => $request->landmarks[$j],
                            'country_id'            => $request->country_id[$j],
                            'state_id'              => $request->state_id[$j],
                            'city_id'               => $request->city_id[$j],
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }
                }


                if(request()->hasFile('avatar'))
                {
                    if(!empty($user->avatar))
                    {
                        $avatar = "/storage/users/{$user->id}/{$user->avatar}";
                        $path = str_replace('\\','/',public_path());

                        if(file_exists($path . $avatar))
                        {
                            unlink($path . $avatar);
                        }
                    }

                    $avatar = request()->file('avatar')->getClientOriginalName();
                    request()->file('avatar')->storeAs('/', "/users/{$user->id}/{$avatar}", '');
                    $user->update(['avatar' =>  $avatar]);

                }
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

        return redirect()->route('dashboard.customers.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);
        return redirect()->route('dashboard.customers.index')->with('success','Data deleted successfully');
    }
}
