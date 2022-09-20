<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Models\Pickup;
use App\Models\PickupCustomerLog;
use Illuminate\Http\Request;

class PickupCustomerLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pickup)
    {
        $pickup  = Pickup::findOrFail($pickup);
        return view('pickups.customerlog.index',compact('pickup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pickup)
    {
        $pickup  = Pickup::findOrFail($pickup);
        $hubs   = Hub::all();
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
        return view('pickups.customerlog.create',compact('pickup','logs','hubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($pickup,Request $request)
    {
        switch ($request->status){
            case 'Created';
                $request['description'] = 'It is expected to pickup your order at pickup date.';
                break;
            case 'Out for pickup';
                $request['description'] = 'Your order is out for pickup soon.';
                break;
            case 'Picked up';
                $request['description'] = 'Your order has been picked up and is expected to be delivered to customer soon.';
                break;

        }

        $pickupLog  = PickupCustomerLog::create([
            'status'                 => $request->status,
            'description'            => $request->description,
            'notes'                  => $request->notes,
            'pickup_id'              => $pickup,
            'hub_id'                 => $request->hub_id,
        ]);

        //$users = User::find(1);
        //Notification::send($users, new \App\Notifications\OrderLog($pickupLog));

        return redirect('dashboard/pickups/'.$pickup.'/pickup-customer-logs')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PickupCustomerLog  $pickupCustomerLog
     * @return \Illuminate\Http\Response
     */
    public function show(PickupCustomerLog $pickupCustomerLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PickupCustomerLog  $pickupCustomerLog
     * @return \Illuminate\Http\Response
     */
    public function edit(PickupCustomerLog $pickupCustomerLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PickupCustomerLog  $pickupCustomerLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PickupCustomerLog $pickupCustomerLog)
    {
        //$this->validate($request, PickupLog::rules($update = true, $pickupLog->id));

        $pickupCustomerLog->update([
            'status'                 => $request->status,
            'description'            => $request->description,
            'notes'                  => $request->notes,
            'pickup_id'              => $request->pickup_id,
            'hub_id'                 => $request->hub_id,
        ]);

        return redirect()->route('dashboard.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PickupCustomerLog  $pickupCustomerLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickupCustomerLog $pickupCustomerLog)
    {
        PickupCustomerLog::destroy($pickupCustomerLog->id);
        return redirect()->back()->with('success','Data deleted successfully');
    }
}
