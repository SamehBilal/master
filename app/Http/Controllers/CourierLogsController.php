<?php

namespace App\Http\Controllers;

use App\Models\CourierLog;
use App\Models\Order;
use App\Models\OrdersCouriers;
use App\Models\Pickup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
        $log  = CourierLog::create([
            'courier_id'             => $request->courier_id,
            'pickup_id'              => $request->pickup_id,
            'order_id'               => $order->id,
        ]);

        $users = User::find($request->courier_id);
        Notification::send($users, new \App\Notifications\NewCourier($log));

        return redirect()->route('dashboard.orders.show',$order->id)->with('success','Data updated successfully');
    }

    public function store_pickup(Request $request,Pickup $pickup)
    {
        $log  = CourierLog::create([
            'courier_id'             => $request->courier_id,
            'order_id'               => $request->order_id,
            'pickup_id'              => $pickup->id,
        ]);

        $users = User::find($request->courier_id);
        Notification::send($users, new \App\Notifications\NewCourier($log));

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
    public function edit_order(Order $order, OrdersCouriers $log)
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "operation courier"); })->get();

        return view('users.couriers.edit-courier-order',compact('order','users','log'));
    }

    public function edit_pickup(Pickup $pickup, OrdersCouriers $log)
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "operation courier"); })->get();

        return view('users.couriers.edit-courier-pickup',compact('pickup','users','log'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_order(Request $request, Order $order, OrdersCouriers $log)
    {
        $log->update([
            'courier_id'            => $request->courier_id,
        ]);

        return redirect()->route('dashboard.orders.show',$order->id)->with('success','Data updated successfully');
    }

    public function update_pickup(Request $request,Pickup $pickup, OrdersCouriers $log)
    {
        $log->update([
            'courier_id'            => $request->courier_id,
        ]);

        return redirect()->route('dashboard.pickups.show',$pickup->id)->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_order(Order $order, OrdersCouriers $log)
    {
        OrdersCouriers::destroy($log->id);
        return redirect()->route('dashboard.orders.show',$order->id)->with('success','Data deleted successfully');
    }

    public function delete_pickup(Pickup $pickup, OrdersCouriers $log)
    {
        OrdersCouriers::destroy($log->id);
        return redirect()->route('dashboard.pickups.show',$pickup->id)->with('success','Data deleted successfully');
    }
}
