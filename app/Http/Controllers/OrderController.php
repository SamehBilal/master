<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\State;
use App\Traits\Verified;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class OrderController extends Controller
{
    use Verified;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('updated_at','desc');

        if(request()->tracking_no)
        {
            $orders = $orders->where('tracking_no', request()->tracking_no);
        }
        if(request()->status)
        {
            $orders = $orders->where('status', request()->status);
        }
        if(request()->cash_on_delivery)
        {
            $orders = $orders->where('cash_on_delivery', '<=',request()->cash_on_delivery);
        }
        /*if(request()->date)
        {
            list($from, $to) = explode(' to ', request()->date);
            $from = date('Y-m-d H:i:s',strtotime($from));
            $to = date('Y-m-d H:i:s',strtotime($to));
            $orders = $orders->whereBetween('updated_at', [$from, $to]);
        }*/

        $orders = $orders->get();
        $max_order = Order::max('cash_on_delivery');
        $status = ['New','Awaiting your action','On hold','Canceled','Rescheduled','Out for delivery','Completed','Return to origin','Cannot be delivered'];
        $types  = [
            'Deliver' => [
                'name'          => 'Deliver',
                'image'         => 'fast-delivery.png',
                'description'   => 'Deliver a package',
                'color'         => 'danger',
                ],
            'Exchange' =>  [
                'name'          => 'Exchange',
                'image'         => 'transfer.png',
                'description'   => 'Exchange a package',
                'color'         => 'dark',
                ],
            'Return' => [
                'name'          => 'Return',
                'image'         => 'return-on-investment.png',
                'description'   => 'Pickup from customer',
                'color'         => 'warning',
                ],
            'Cash Collection' => [
                'name'          => 'Cash Collection',
                'image'         => 'money.png',
                'description'   => 'Collect or refund',
                'color'         => 'accent',
                ],
        ];
        return view('orders.index',compact('orders','status','types','max_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pickups    = Pickup::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        $locations  = Location::all();
        $customers  = Customer::all();
        $contacts   = Contact::all();
        return view('orders.create',compact('pickups','cities', 'states','countries','locations','customers','contacts'));
    }

    public function multi()
    {
        return view('orders.create-multi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Order::rules());

        try {
            switch($request->type)
            {
                case 'Deliver';
                    $order = Order::create([
                        'pickup_id'             => $request->pickup_id,
                        'type'                  => $request->type,
                        'scheduled_date'        => $request->scheduled_date,
                        'status'                => $request->status,
                        'notes'                 => $request->notes,
                        'contact_id'            => $request->contact_id,
                        'location_id'           => $request->location_id,
                    ]);
                    break;
                case 'Exchange';
                    $order = Order::create([
                        'pickup_id'             => $request->pickup_id,
                        'type'                  => $request->type,
                        'scheduled_date'        => $request->scheduled_date,
                        'status'                => $request->status,
                        'notes'                 => $request->notes,
                        'contact_id'            => $request->contact_id,
                        'location_id'           => $request->location_id,
                    ]);
                    break;
                case 'Return';
                    $order = Order::create([
                        'type'                  => $request->type,
                        'scheduled_date'        => $request->scheduled_date,
                        'status'                => $request->status,
                        'notes'                 => $request->notes,
                        'contact_id'            => $request->contact_id,
                        'location_id'           => $request->location_id,
                    ]);
                    break;
                case 'Cash Collection';
                    $order = Order::create([
                        'type'                  => $request->type,
                        'scheduled_date'        => $request->scheduled_date,
                        'status'                => $request->status,
                        'notes'                 => $request->notes,
                        'contact_id'            => $request->contact_id,
                        'location_id'           => $request->location_id,
                    ]);
                    break;
            }

            \DB::transaction(function () use(/* $data, */ $request) {

                $order = Order::create([
                    'pickup_id'             => $request->pickup_id,
                    'type'                  => $request->type,
                    'scheduled_date'        => $request->scheduled_date,
                    'status'                => $request->status,
                    'notes'                 => $request->notes,
                    'contact_id'            => $request->contact_id,
                    'location_id'           => $request->location_id,
                ]);

                if(!$request->contact_id){
                    $contact = Contact::create([
                        'contact_name'          => $request->contact_name,
                        'contact_job_title'     => $request->contact_job_title,
                        'contact_email'         => $request->contact_email,
                        'contact_phone'         => $request->contact_phone,
                    ]);
                }

                for($j=0;$j < count($request->street);$j++){
                    $user->address()->create([
                        'street'                => $request->street[$j],
                        'building'              => $request->building[$j],
                        'floor'                 => $request->floor[$j],
                        'apartment'             => $request->apartment[$j],
                        'country_id'            => $request->country_id[$j],
                        'city_id'               => $request->city_id[$j],
                        /*'zone_id'               => $request->zone_id[$j],*/
                    ]);
                }

                $user->assignRole('customer');
                return redirect()->route('dashboard.orders.show',$order->id)->with('success','Data created successfully');
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $qr = QrCode::generate(route('dashboard.orders.show',$order->id));

        return view('orders.show',compact('order','qr'));
    }

    public function airwaybell(Order $order)
    {
        //$order = Order::findOrFail($order);
        $qr = QrCode::generate(route('orders.show',$order->id));
        //$pdf = PDF::loadView('orders.pdf', $order);
        //PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0)->save('myfile.pdf')
        //$html = view('orders.pdf', compact('order','qr'))->render();
        return view('orders.pdf',compact('qr','order'));
        //$html = view('orders.show', compact('order','qr'))->render();
        //return @\PDF::loadHTML($data, 'utf-8')->stream(); // to debug + add the follosing headers in controller ( TOP LEVEL )
        //$pdf = PDF::loadHTML($html);
        //return $pdf->stream("filename.pdf", array("Attachment" => false));

        $pdf = PDF::loadHTML($html)->stream();
        //$pdf->stream("filename.pdf", array("Attachment" => false));
        return $pdf->download('pdf_file.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $pickups = Pickup::all();
        $states = State::all();
        $cities = City::all();
        $countries = Country::all();
        $locations = Location::all();
        return view('orders.edit',compact('order','pickups','cities','states','countries','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $this->validate($request, Order::rules($update = true, $order->id));

        $order->update([
            'pickup_id'             => $request->pickup_id,
            'type'                  => $request->type,
            'scheduled_date'        => $request->scheduled_date,
            'status'                => $request->status,
            'notes'                 => $request->notes,
            'contact_id'            => $request->contact_id,
            'location_id'           => $request->location_id,
        ]);

        return redirect()->route('dashboard.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect()->route('dashboard.orders.index')->with('success','Data deleted successfully');
    }
}
