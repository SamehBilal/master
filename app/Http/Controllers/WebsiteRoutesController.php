<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;

class WebsiteRoutesController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function about()
    {
        return view('website.about');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function pricing()
    {
        return view('website.pricing');
    }

    public function calculate_shipment()
    {
        $subtotal   =   '';
        $tax        =   '';
        $total      =   '';
        if(request()->from && request()->to)
        {
            $subtotal   =   1990;
            $tax        =   50;
            $total      =   2040;
        }
        return view('website.calculation',compact('subtotal','total','tax'));
    }

    public function terms()
    {
        return view('website.terms');
    }

    public function track($order)
    {
        $order = Order::findOrFail($order);
        return view('website.tracking',compact('order'));
    }

    public function search()
    {
        $order          = '';
        $location       = '';
        if(request()->s)
        {
            $order      = Order::where('tracking_no',request()->s)->get();
            $location   = Location::findOrFail($order[0]['location_id']);
        }
        return view('website.search',compact('order','location'));
    }

    public function account()
    {
        $user           = auth()->user();
        return view('website.account',compact('user'));
    }
}
