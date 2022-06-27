<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Models\Pickup;
use App\Models\PickupLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PickupLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pickup)
    {
        $pickup  = Pickup::findOrFail($pickup);
        return view('pickups.log.index',compact('pickup'));
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
        return view('pickups.log.create',compact('pickup','logs','hubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($pickup,Request $request)
    {
        //$this->validate($request, OrderLog::rules());

        switch ($request->status){
            case 'Created';
                $request['description'] = 'It is expected to pickup your order at pickup date.';
                break;
            case 'Out for pickup';
                $request['description'] = 'Your is out for pickup soon.';
                break;
            case 'Picked up';
                $request['description'] = 'Your order has been picked up and is expected to be delivered to customer soon.';
                break;

        }

        $pickupLog  = PickupLog::create([
            'status'                 => $request->status,
            'description'            => $request->description,
            'notes'                  => $request->notes,
            'pickup_id'              => $pickup,
            'hub_id'                 => $request->hub_id,
        ]);

        //$users = User::find(1);
        //Notification::send($users, new \App\Notifications\OrderLog($pickupLog));

        return redirect('dashboard/pickups/'.$pickup.'/pickup-logs')->with('success','Data created successfully');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PickupLog $pickupLog)
    {
        $this->validate($request, PickupLog::rules($update = true, $pickupLog->id));

        $pickupLog->update([
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pickup, PickupLog $pickupLog)
    {
        PickupLog::destroy($pickupLog->id);
        return redirect()->back()->with('success','Data deleted successfully');
    }
}
