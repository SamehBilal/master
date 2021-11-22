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
        if(request()->cash_on_delivery)
        {
            $pickups = $pickups->where('cash_on_delivery', '<=',request()->cash_on_delivery);
        }
        $pickups = $pickups->get();
        $status = ['Created','Out for pickup'];
        return view('pickups.index',compact('pickups','status'));
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
        $states     = State::all();
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
        $this->validate($request, Pickup::rules());

        $pickup = Pickup::create([
            'pickup_id'             => $request->pickup_id,
            'type'                  => $request->type,
            'scheduled_date'        => $request->scheduled_date,
            'status'                => $request->status,
            'notes'                 => $request->notes,
            'contact_id'            => $request->contact_id,
            'location_id'           => $request->location_id,
        ]);

        return redirect()->route('pickups.show',$pickup->id)->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function show(Pickup $pickup)
    {
        return view('pickups.show',compact('pickup'));
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
        $states     = State::all();
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

        return redirect()->route('pickups.index')->with('success','Data updated successfully');
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
        return redirect()->route('pickups.index')->with('success','Data deleted successfully');
    }
}
