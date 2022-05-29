<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Deal;
use App\Models\Location;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteRoutesController extends Controller
{
    public function index()
    {
        $deals = Deal::all()->where('status','Public');
        return view('website.index',compact('deals'));
    }

    public function about()
    {
        $info = About::find(1);
        return view('website.about',compact('info'));
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

    public function privacy()
    {
        return view('website.privacy');
    }

    public function track($order)
    {
        $order = Order::findOrFail($order);
        return view('website.tracking',compact('order'));
    }

    public function search()
    {
        $order          = '';
        if(request()->s)
        {
            $order       = Order::where('tracking_no',request()->s)->first();
        }

        return view('website.search',compact('order'));
    }

    public function account()
    {
        $user           = auth()->user();
        if(!$user)
        {
            abort(404);
        }
        if($user->customer)
        {
            $orders     = $user->customer->orders;
        }else{
            $orders = [];
        }

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
