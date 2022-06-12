<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pickup;
use App\Models\User;
use Illuminate\Http\Request;

class CourierLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_order(Order $order)
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "operation courier"); })->get();

        return view('users.couriers.courier-order',compact('order','users'));
    }

    public function create_pickup(Pickup $pickup)
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "operation courier"); })->get();

        return view('users.couriers.courier-pickup',compact('pickup','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_order(Request $request,Order $order)
    {
        $order->couriers()->create([
            'courier_id'            => $request->courier_id,
        ]);

        return redirect()->route('dashboard.orders.show',$order->id)->with('success','Data updated successfully');
    }

    public function store_pickup(Request $request,Pickup $pickup)
    {
        $pickup->couriers()->create([
            'courier_id'            => $request->courier_id,
        ]);

        return redirect()->route('dashboard.pickups.show',$pickup->id)->with('success','Data updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_order(Order $order,$id)
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "operation courier"); })->get();

        return view('users.couriers.edit-courier-order',compact('order','users'));
    }

    public function edit_pickup(Pickup $pickup,$id)
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "operation courier"); })->get();

        return view('users.couriers.edit-courier-pickup',compact('pickup','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
