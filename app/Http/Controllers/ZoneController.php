<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('setup.zones.index');
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
        return view('setup.zones.index',compact('countries','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Zone::rules());

        $zone = Zone::create([
            'name'                  => $request->name,
            'price'                 => $request->price,
            'available'             => $request->available,
            'country_id'            => $request->country_id,
            'city_id'               => $request->city_id,
        ]);

        return redirect()->route('zones.show',$zone->id)->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        return view('setup.zones.show',compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        $countries  = Country::all();
        $cities     = City::all();
        return view('setup.zones.edit',compact('zone','countries','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        $this->validate($request, Zone::rules($update = true, $zone->id));

        $zone->update([
            'name'                  => $request->name,
            'price'                 => $request->price,
            'available'             => $request->available,
            'country_id'            => $request->country_id,
            'city_id'               => $request->city_id,
        ]);

        return redirect()->route('zones.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        Zone::destroy($zone->id);
        return redirect()->route('zones.index')->with('success','Data deleted successfully');
    }
}
