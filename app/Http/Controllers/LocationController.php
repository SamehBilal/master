<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Location;
use App\Models\State;
use App\Models\User;
use App\Traits\AjaxSelect;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    use AjaxSelect;
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
            $locations = Location::where('business_user_id',$user->id)
                ->orderBy('updated_at','desc')
                ->get();
        }else{
            $locations = Location::orderBy('updated_at','desc')
                ->get();
        }

        return view('setup.locations.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries  = Country::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        return view('setup.locations.create',compact('countries','states','cities'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Location::rules());

        $user_id = auth()->user()->id;

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
            'zone_id'               => $request->zone_id,
            'customer_id'           => $request->customer_id,
            'working_address'       => $request->working_address,
            'business_user_id'      => $user_id,
        ]);

        return redirect()->route('dashboard.locations.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $countries  = Country::all();
        $states     = State::where('country_id',$location->country_id)->get();
        $cities     = City::where('state_id',$location->state_id)->get();
        return view('setup.locations.edit',compact('location','countries','states','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $countries  = Country::all();
        $states     = State::where('country_id',$location->country_id)->get();
        $cities     = City::where('state_id',$location->state_id)->get();
        return view('setup.locations.edit',compact('location','countries','states','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, Location::rules($update = true, $location->id));

        $user_id = auth()->user()->id;

        $location->update([
            'name'                  => $request->name,
            'street'                => $request->street,
            'building'              => $request->building,
            'floor'                 => $request->floor,
            'apartment'             => $request->apartment,
            'landmarks'             => $request->landmarks,
            'country_id'            => $request->country_id,
            'state_id'              => $request->state_id,
            'city_id'               => $request->city_id,
            'zone_id'               => $request->zone_id,
            'customer_id'           => $request->customer_id,
            'working_address'       => $request->working_address,
            'business_user_id'      => $user_id,
        ]);

        if($request->pickup_id != ''){
            return redirect()->route('dashboard.pickups.show',$request->pickup_id)->with('success','Data updated successfully');
        }else{
            return redirect()->route('dashboard.locations.index')->with('success','Data updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        Location::destroy($location->id);
        return redirect()->route('dashboard.locations.index')->with('success','Data deleted successfully');
    }
}
