<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use App\Models\Pickup;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Location;
use App\Models\OrderLog;
use App\Traits\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\Helpers\UserHelperController;

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
        DB::beginTransaction();
        //dd($request->all());
        $this->validate($request, Order::rules());
        try {
            if($request->customer_id == null)
            {
                $request->request->add(['password' => 123456789]);
                $request->request->add(['password_confirmation' => 123456789]);
                $request->request->add(['payment' => 'cash']);
        
                $data                           = $request->all();
                $data['password']               = Hash::make(123456789);
                $data['password_confirmation']  = $data['password'];
                $data['other_email']            = null;
                $data['religion']               = null;
                $user                           = null;
                
                $userhelperController = new UserHelperController();
                $user = $userhelperController->createuser($data);
                $customer = Customer::create([
                    'user_id'                   => $user->id,
                    'fax'                       => $request->fax,
                    'status'                    => $request->status,
                    'user_category_id'          => $request->user_category_id,
                    'currency_id'               => $request->currency_id,
                    'note'                      => $request->note,
                    'payment'                   => $request->payment,
                    'business_user_id'          => auth()->user()->id,
                ]);
            }else{
                $customer = Customer::findOrFail($request->customer_id);
            }

            if($request->location_id == null)
            {
                $location = $customer->location()->create([
                    'name'                  => $request->location_name,
                    'street'                => $request->street,
                    'building'              => $request->building,
                    'floor'                 => $request->floor,
                    'apartment'             => $request->apartment,
                    'landmarks'             => $request->landmarks,
                    'country_id'            => $request->country_id,
                    'state_id'              => $request->state_id,
                    'city_id'               => $request->city_id,
                    'business_user_id'      => auth()->user()->id,
                ]);
            }
            switch($request->type)
            {
                case 'Deliver';
                    if($request->pickup_id == null)
                    {
                        $request['pickup_id'] = random_int(100000, 999999);
                        $request['status'] = 'Created';
                        $request['type'] = 'One Time';
                        $this->validate($request, Pickup::rules());
                        $pickup = Pickup::create([
                            'pickup_id'             => $request->pickup_id,
                            'type'                  => $request->type,
                            'scheduled_date'        => $request->scheduled_date,
                            'start_date'            => $request->scheduled_date,
                            'status'                => $request->status,
                            'contact_id'            => $request->contact_in,
                            'location_id'           => $request->pickup_location_id,
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }

                    $order = Order::create([
                        'with_cash_collection'                  => $request->with_cash_collection,
                        'cash_on_delivery'                      => $request->cash_on_delivery,
                        'package_type'                          => $request->radio_stacked,
                        'light_bulky'                           => $request->light_bulky,
                        'package_description'                   => $request->package_description,
                        'no_of_items'                           => $request->no_of_items,
                        'order_reference'                       => $request->order_reference,
                        'open_package'                          => $request->open_package,
                        'delivery_notes'                        => $request->delivery_notes,
                        'customer_id'                           => $request->customer_id == null ? $customer->id:$request->customer_id,
                        'location_id'                           => $request->location_id == null ? $location->id:$request->location_id,
                        'pickup_id'                             => $request->pickup_id   == null ? $pickup->id:$request->pickup_id,
                        'business_user_id'                      => auth()->user()->id,
                    ]);
                    break;
                case 'Exchange';

                    if($request->pickup_id == null)
                    {
                        $request['pickup_id'] = random_int(100000, 999999);
                        $request['status'] = 'Created';
                        $request['type'] = 'One Time';
                        $this->validate($request, Pickup::rules());
                        $pickup = Pickup::create([
                            'pickup_id'             => $request->pickup_id,
                            'type'                  => $request->type,
                            'scheduled_date'        => $request->scheduled_date,
                            'start_date'            => $request->scheduled_date,
                            'status'                => $request->status,
                            'contact_id'            => $request->contact_in,
                            'location_id'           => $request->pickup_location_id,
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }

                    if($request->return_location == null)
                    {
                        $return_location = Location::create([
                            'name_exchange'                  => $request->name_exchange,
                            'street_exchange'                => $request->street_exchange,
                            'building_exchange'              => $request->building_exchange,
                            'floor_exchange'                 => $request->floor_exchange,
                            'apartment_exchange'             => $request->apartment_exchange,
                            'landmarks_exchange'             => $request->landmarks_exchange,
                            'country_id_exchange'            => $request->country_id_exchange,
                            'state_id_exchange'              => $request->state_id_exchange,
                            'city_id_exchange'               => $request->city_id_exchange,
                            'working_hours_exchange'         => $request->working_hours_exchange,
                            'business_user_id'               => auth()->user()->id,
                        ]);
                    }

                    $order = Order::create([
                        'with_cash_difference'                          => $request->with_cash_difference,
                        'cash_exchange_amount'                          => $request->cash_exchange_amount,
                        'no_of_items_exchange'                          => $request->no_of_items_exchange,
                        'package_description_exchange'                  => $request->package_description_exchange,
                        'order_reference_exchange'                      => $request->order_reference_exchange,
                        'allow_opening'                                 => $request->allow_opening,
                        'no_of_items_of_return_package_exchange'        => $request->no_of_items_of_return_package_exchange,
                        'package_description_return_package_exchange'   => $request->package_description_return_package_exchange,
                        'return_location_exchange'                      => $request->return_location_exchange == null ? $return_location->id:$request->return_location_exchange,
                        'delivery_notes'                                => $request->delivery_notes,
                        'customer_id'                                   => $request->customer_id == null ? $customer->id:$request->customer_id,
                        'location_id'                                   => $request->location_id == null ? $location->id:$request->location_id,
                        'pickup_id'                                     => $request->pickup_id   == null ? $pickup->id:$request->pickup_id,
                        'business_user_id'                              => auth()->user()->id,
                    ]);
                    break;
                case 'Return';
                    if($request->return_location == null)
                    {
                        $return_location = Location::create([
                            'name_return'                  => $request->name_return,
                            'street_return'                => $request->street_return,
                            'building_return'              => $request->building_return,
                            'floor_return'                 => $request->floor_return,
                            'apartment_return'             => $request->apartment_return,
                            'landmarks_return'             => $request->landmarks_return,
                            'country_id_return'            => $request->country_id_return,
                            'state_id_return'              => $request->state_id_return,
                            'city_id_return'               => $request->city_id_return,
                            'working_hours_return'         => $request->working_hours_return,
                            'business_user_id'             => auth()->user()->id,
                        ]);
                    }

                    $order = Order::create([
                        'refund_amount'                         => $request->refund_amount,
                        'with_refund'                           => $request->with_refund,
                        'no_of_items_return'                    => $request->no_of_items_return,
                        'package_description_return'            => $request->package_description_return,
                        'order_reference_return'                => $request->order_reference_return,
                        'return_location'                       => $request->return_location == null ? $return_location->id:$request->return_location,
                        'delivery_notes'                        => $request->delivery_notes,
                        'customer_id'                           => $request->customer_id == null ? $customer->id:$request->customer_id,
                        'location_id'                           => $request->location_id == null ? $location->id:$request->location_id,
                        'business_user_id'                      => auth()->user()->id,
                    ]);
                    break;
                case 'Cash Collection';
                    $order = Order::create([
                        'cash_to_collect'                       => $request->cash_to_collect,
                        'collect_cash'                          => $request->collect_cash,
                        'order_reference_cash_collection'       => $request->order_reference_cash_collection,
                        'delivery_notes'                        => $request->delivery_notes,
                        'customer_id'                           => $request->customer_id == null ? $customer->id:$request->customer_id,
                        'location_id'                           => $request->location_id == null ? $location->id:$request->location_id,
                        'business_user_id'                      => auth()->user()->id,
                    ]);
                    break;
            }
            DB::commit();
            return redirect()->route('dashboard.orders.show',$order->id)->with('success','Data created successfully');

        } catch (\Exception $ex) {
            DB::rollback();
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
        $qr     = QrCode::generate(route('dashboard.orders.show',$order->id));
        $log    = $order->log()->first();
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
        return view('orders.show',compact('order','qr','logs','log'));
    }

    public function airwaybell(Order $order)
    {
        //$order = Order::findOrFail($order);
        $qr = QrCode::generate(route('dashboard.orders.show',$order->id));
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
        $pickups    = Pickup::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        $locations  = Location::all();
        $customers  = Customer::all();
        $contacts   = Contact::all();
        return view('orders.edit',compact('order','pickups','cities','states','countries','locations','customers','contacts'));
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
