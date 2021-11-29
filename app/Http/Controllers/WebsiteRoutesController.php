<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function calculate_shipment(Request $request)
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
}
