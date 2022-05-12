<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use Illuminate\Http\Request;

class HubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hubs = Hub::orderBy('updated_at','desc')
            ->get();
        return view('setup.hubs.index',compact('hubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.hubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Hub::rules());

        $hub = Hub::create([
            'ar_name'                  => $request->ar_name,
            'en_name'                  => $request->en_name,
        ]);

        return redirect()->route('dashboard.hubs.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function show(Hub $hub)
    {
        return view('setup.hubs.edit',compact('hub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function edit(Hub $hub)
    {
        return view('setup.hubs.edit',compact('hub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hub $hub)
    {
        $this->validate($request, Hub::rules($update = true, $hub->id));

        $hub->update([
            'ar_name'                  => $request->ar_name,
            'en_name'                  => $request->en_name,
        ]);

        return redirect()->route('dashboard.hubs.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hub $hub)
    {
        Hub::destroy($hub->id);
        return redirect()->route('dashboard.hubs.index')->with('success','Data deleted successfully');
    }
}
