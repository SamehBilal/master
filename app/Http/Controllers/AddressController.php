<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.addresses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries  = Country::all();
        $cities     = City::all();
        $zones      = Zone::all();
        $users      = User::all();
        return view('users.addresses.create',compact('countries','cities','zones','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, address::rules());

        $address = address::create([
            'street'                => $request->street,
            'building'              => $request->building,
            'floor'                 => $request->floor,
            'apartment'             => $request->apartment,
            'country_id'            => $request->country_id,
            'city_id'               => $request->city_id,
            'zone_id'               => $request->zone_id,
            'user_id'               => $request->user_id,
        ]);

        return redirect()->route('addresses.show',$address->id)->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        return view('users.addresses.show',compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        $countries  = Country::all();
        $cities     = City::all();
        $zones      = Zone::all();
        $users      = User::all();
        return view('users.addresses.edit',compact('address','countries','cities','zones','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, address $address)
    {
        $this->validate($request, address::rules($update = true, $address->id));

        $address->update([
            'street'                => $request->street,
            'building'              => $request->building,
            'floor'                 => $request->floor,
            'apartment'             => $request->apartment,
            'country_id'            => $request->country_id,
            'city_id'               => $request->city_id,
            'zone_id'               => $request->zone_id,
            'user_id'               => $request->user_id,
        ]);

        return redirect()->route('addresses.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(address $address)
    {
        address::destroy($address->id);
        return redirect()->route('addresses.index')->with('success','Data deleted successfully');
    }
}
