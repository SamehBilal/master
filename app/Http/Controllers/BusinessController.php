<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\City;
use App\Models\Country;
use App\Models\Location;
use App\Models\State;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Business::all();
        return view('users.customers.business.index',compact('business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations  = Location::all();
        $countries  = Country::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $categories = [
            'Books, Arts and Media',
            'Electronics',
            'Cosmetics and personal care',
            'Fashion',
            'Furniture and appliances',
            'Healthcare supplements',
            'Home and living',
            'Gifts',
            'Jewelry and accessories',
            'Leather',
            'Mothers and babies',
            'Medical supplies',
            'Office equipment and supplies',
            'Pet supplies',
            'Sports wear and equipment',
            'Toys',
            'E-commerce',
            'Food',
            'Shoes',
        ];
        return view('users.customers.business.create',compact('locations','countries','states','cities','categories'));
    }

    public function create_front()
    {
        $countries  = Country::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::where('state_id',1500)->get();
        $categories = [
            'Books, Arts and Media',
            'Electronics',
            'Cosmetics and personal care',
            'Fashion',
            'Furniture and appliances',
            'Healthcare supplements',
            'Home and living',
            'Gifts',
            'Jewelry and accessories',
            'Leather',
            'Mothers and babies',
            'Medical supplies',
            'Office equipment and supplies',
            'Pet supplies',
            'Sports wear and equipment',
            'Toys',
            'E-commerce',
            'Food',
            'Shoes',
        ];
        return view('users.customers.business.create_front',compact('categories','states','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Business::rules());

        $user_id = auth()->user()->id;

        if($request->location_in == null)
        {
            $this->validate($request, Location::rules());
            $location = Location::create([
                'name'                  => $request->name,
                'street'                => $request->street,
                'building'              => $request->building,
                'floor'                 => $request->floor,
                'apartment'             => $request->apartment,
                'landmarks'             => $request->landmarks,
                'country_id'            => $request->country_id,
                'state_id'              => $request->state_id,
                'city_id'               => $request->city_id,
                'business_user_id'      => $user_id,
            ]);
        }

        $business = Business::create([
            'ar_name'                 => $request->ar_name,
            'en_name'                 => $request->en_name,
            'sales_channel'           => $request->sales_channel,
            'industry'                => $request->industry,
            'store_url'               => $request->store_url,
            'location_id'             => ($request->location_in = null) ? $location:$request->location_id,
            'business_user_id'        => $user_id,
        ]);

        return redirect()->route('dashboard.businesses.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        $locations  = Location::all();
        $countries  = Country::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $categories = [
            'Books, Arts and Media',
            'Electronics',
            'Cosmetics and personal care',
            'Fashion',
            'Furniture and appliances',
            'Healthcare supplements',
            'Home and living',
            'Gifts',
            'Jewelry and accessories',
            'Leather',
            'Mothers and babies',
            'Medical supplies',
            'Office equipment and supplies',
            'Pet supplies',
            'Sports wear and equipment',
            'Toys',
            'E-commerce',
            'Food',
            'Shoes',
        ];
        return view('users.customers.business.edit',compact('locations','countries','states','cities','categories','business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        $locations  = Location::all();
        $countries  = Country::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $categories = [
            'Books, Arts and Media',
            'Electronics',
            'Cosmetics and personal care',
            'Fashion',
            'Furniture and appliances',
            'Healthcare supplements',
            'Home and living',
            'Gifts',
            'Jewelry and accessories',
            'Leather',
            'Mothers and babies',
            'Medical supplies',
            'Office equipment and supplies',
            'Pet supplies',
            'Sports wear and equipment',
            'Toys',
            'E-commerce',
            'Food',
            'Shoes',
        ];
        return view('users.customers.business.edit',compact('locations','countries','states','cities','categories','business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $this->validate($request, Business::rules($update = true, $business->id));

        $user_id = auth()->user()->id;

        if($request->location_in == null)
        {
            $this->validate($request, Location::rules());
            $location = Location::create([
                'name'                  => $request->name,
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

        $business->update([
            'ar_name'                 => $request->ar_name,
            'en_name'                 => $request->en_name,
            'sales_channel'           => $request->sales_channel,
            'industry'                => $request->industry,
            'store_url'               => $request->store_url,
            'location_id'             => ($request->location_in = null) ? $location:$request->location_id,
            'business_user_id'        => $user_id,
        ]);

        return redirect()->route('dashboard.businesses.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        Business::destroy($business->id);
        return redirect()->route('dashboard.businesses.index')->with('success','Data deleted successfully');
    }
}
