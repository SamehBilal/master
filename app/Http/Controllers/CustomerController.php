<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Customer;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('UserCategory')->paginate(20);
        $categories = UserCategory::all();
        return view('users.customers.index',compact('customers','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = UserCategory::all();
        $currencies = Currency::all();
        return view('users.customers.create',compact('currencies','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Customer::rules());

        $customer = Customer::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'other_phone'           => $request->other_phone,
            'fax'                   => $request->fax,
            'note'                  => $request->note,
            'web_address'           => $request->web_address,
            'status'                => $request->status,
            'payment'               => $request->payment,
            'user_id'               => $request->user_id,
            'user_category_id'      => $request->user_category_id,
            'currency_id'           => $request->currency_id,
        ]);

        if(request()->hasFile('avatar'))
        {
            $image = time() . '_' . request()->file('avatar')->getClientOriginalName();
            request()->file('avatar')->storeAs('/', "/user/{$image}", '');
            $customer->auth()->user()->update(['avatar' =>  $image]);
        }

        return redirect()->route('customers.show',$customer->id)->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('users.customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $categories = UserCategory::all();
        $currencies = Currency::all();
        return view('users.customers.edit',compact('customer','categories','currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, Customer::rules($update = true, $customer->id));

        $customer->update([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'other_phone'           => $request->other_phone,
            'fax'                   => $request->fax,
            'note'                  => $request->note,
            'web_address'           => $request->web_address,
            'status'                => $request->status,
            'payment'               => $request->payment,
            'user_id'               => $request->user_id,
            'user_category_id'      => $request->user_category_id,
            'currency_id'           => $request->currency_id,
        ]);

        return redirect()->route('customers.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);
        return redirect()->route('customers.index')->with('success','Data deleted successfully');
    }
}
