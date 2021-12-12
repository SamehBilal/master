<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteRoutesController extends Controller
{
    public function index()
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
        return view('website.index',compact('subtotal','total','tax'));
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
            $order       = Order::where('tracking_no',request()->s)->get();
            $location    = Location::findOrFail($order[0]['location_id']);
        }
        return view('website.search',compact('order','location'));
    }

    public function account()
    {
        $user           = auth()->user();
        $orders         = Auth::user()->customer->orders;
        return view('website.account',compact('user','orders'));
    }

    public function locations()
    {
        return view('website.locations');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, User::rules($update = true, $user->id));

        $user->update([
            'first_name'            => $request->first_name,
            'last_name'             => $request->last_name,
            'full_name'             => $request->full_name,
            'email'                 => $request->email,
            'other_email'           => $request->other_email,
            'username'              => $request->username,
            'password'              => $request->password == '' ? $user->password:$request->password,
            'gender'                => $request->gender,
            'religion'              => $request->religion,
            'date_of_birth'         => $request->date_of_birth,
            'phone'                 => $request->phone,
            'other_phone'           => $request->other_phone,
            'bio'                   => $request->bio,
        ]);

        if(request()->hasFile('avatar'))
        {
            $image = time() . '_' . request()->file('avatar')->getClientOriginalName();
            request()->file('avatar')->storeAs('/public', "/user/{$user->id}/{$image}", '');
            $user->update(['avatar' =>  $image]);
        }

        return redirect()->back()->with('success','Data updated successfully');
    }
}
