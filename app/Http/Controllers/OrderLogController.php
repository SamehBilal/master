<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order)
    {
        $order  = Order::findOrFail($order);
        return view('orders.log.index',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order)
    {
        $order  = Order::findOrFail($order);
        $hubs   = Hub::all();
        $logs  = [
            0 => [
                'type' => 'New',
                'icon' => 'new_releases',
            ],
            1 => [
                'type' => 'Picked up',
                'icon' => 'hail',
            ],
            2 => [
                'type' => 'In transit',
                'icon' => 'home_work',
            ],
            3 => [
                'type' => 'Out for delivery',
                'icon' => 'local_shipping',
            ],
            4 => [
                'type' => 'Delivered',
                'icon' => 'check',
            ],
        ];
        return view('orders.log.create',compact('order','logs','hubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($order,Request $request)
    {
        //$this->validate($request, OrderLog::rules());

        switch ($request->status){
            case 'New';
                $request['description'] == 'It is expected to be pickup your order at pickup date.';
                break;
            case 'Picked up';
                $request['description'] == 'Your order has been picked up and is expected to be in transit soon.';
                break;
            case 'In transit';
                $request['description'] == 'Your order has been in transit and is expected to be delivered to customer soon.';
                break;
            case 'Out for delivery';
                $request['description'] == 'Your order is out for delivery and is expected to be delivered to customer soon.';
                break;
            case 'Delivered';
                $request['description'] == 'Your order has been delivered to customer.';
                break;
        }

        $orderLog  = OrderLog::create([
            'status'                 => $request->status,
            'description'            => $request->description,
            'notes'                  => $request->notes,
            'order_id'               => $order,
            'hub_id'                 => $request->hub_id,
            'courier_id'             => $request->courier_id,
        ]);

        $users = User::whereHas("roles", function($q){
            $q->where("name", "Super Admin")
                ->orWhere("name", "admin")
                ->orWhere("name", "operation logistics")
                ->orWhere("name", "operation admin");
        })->get();
        $order = Order::find($order);
        $nuser = User::find($order->business_user_id);
        $nuser->notify(new \App\Notifications\OrderLog($orderLog));
        Notification::send($users, new \App\Notifications\OrderLog($orderLog));

        return redirect('dashboard/orders/'.$order->id.'/order-logs')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderLog  $orderLog
     * @return \Illuminate\Http\Response
     */
    public function show(OrderLog $orderLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderLog  $orderLog
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderLog $orderLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderLog  $orderLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderLog $orderLog)
    {
        $this->validate($request, OrderLog::rules($update = true, $orderLog->id));

        $orderLog->update([
            'status'                 => $request->status,
            'description'            => $request->description,
            'notes'                  => $request->notes,
            'order_id'               => $request->order_id,
            'hub_id'                 => $request->hub_id,
            'courier_id'             => $request->courier_id,
        ]);

        return redirect()->route('dashboard.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderLog  $orderLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($order,OrderLog $orderLog)
    {
        OrderLog::destroy($orderLog->id);
        return redirect()->back()->with('success','Data deleted successfully');
    }
}
