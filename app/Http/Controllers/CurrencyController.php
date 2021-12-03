<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::where('business_user_id',auth()->user()->id)
                                ->orderBy('updated_at','desc')
                                ->get();
        return view('setup.currencies.index',compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Currency::rules());

        $user_id = auth()->user()->id;

        $currency = Currency::create([
            'name'                  => $request->name,
            'rate'                  => $request->rate,
            'business_user_id'      => $user_id,
        ]);

        return redirect()->route('dashboard.currencies.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('setup.currencies.edit',compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('setup.currencies.edit',compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $this->validate($request, Currency::rules($update = true, $currency->id));

        $user_id = auth()->user()->id;

        $currency->update([
            'name'                  => $request->name,
            'rate'                  => $request->rate,
            'business_user_id'      => $user_id,
        ]);

        return redirect()->route('dashboard.currencies.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        Currency::destroy($currency->id);
        return redirect()->route('dashboard.currencies.index')->with('success','Data deleted successfully');
    }
}
