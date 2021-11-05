<?php

namespace App\Http\Controllers;

use App\Models\Country;
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
        $orders = Order::all();
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
        return view('orders.index',compact('orders','status','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pickups = Pickup::all();
        $cities = State::where('country_id',64)->get();
        //$states = State::where('country_id',64);
        $countries = Country::all();
        $locations = Location::all();
        return view('orders.create',compact('pickups','cities','countries','locations'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $qr = QrCode::generate(route('orders.show',$order->id));

        return view('orders.show',compact('order','qr'));
    }

    public function airwaybell(Order $order)
    {
        $order = Order::findOrFail($order);
        $qr = QrCode::generate(route('orders.show',$order->id));
        $html = view('orders.pdf', compact('order','qr'))->render();
        //return view('orders.pdf',compact('qr','order'));
        //$html = view('orders.show', compact('order','qr'))->render();
        //return @\PDF::loadHTML($data, 'utf-8')->stream(); // to debug + add the follosing headers in controller ( TOP LEVEL )
        //$pdf = PDF::loadHTML($html);
        //return $pdf->stream("filename.pdf", array("Attachment" => false));

        $pdf = PDF::loadHTML($html)->stream();
        //$pdf->stream("filename.pdf", array("Attachment" => false));
        return $pdf->download('pdf_file.pdf');

        // download PDF file with download method
        //return $pdf->download('pdf_file.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
