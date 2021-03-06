<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = About::find(1);
        return view('website.about.create',compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, About::rules());

        About::create([
            'en_mission'                   => $request->en_mission,
            'ar_mission'                   => $request->ar_mission,
            'en_vision'                    => $request->en_vision,
            'ar_vision'                    => $request->ar_vision,
            'en_footer_description'        => $request->en_footer_description,
            'ar_footer_description'        => $request->ar_footer_description,
        ]);

        return redirect()->back()->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $this->validate($request, About::rules($update = true, $about->id));

        $about->update([
            'en_mission'                   => $request->en_mission,
            'ar_mission'                   => $request->ar_mission,
            'en_vision'                    => $request->en_vision,
            'ar_vision'                    => $request->ar_vision,
            'en_footer_description'        => $request->en_footer_description,
            'ar_footer_description'        => $request->ar_footer_description,
        ]);

        return redirect()->back()->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
