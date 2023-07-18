<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deal::orderBy('updated_at','desc')
            ->get();
        return view('website.deals.index',compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.deals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Deal::rules());

        $deal = Deal::create([
            'en_title'                  => $request->en_title,
            'ar_title'                  => $request->ar_title,
            'en_description'            => $request->en_description,
            'ar_description'            => $request->ar_description,
            'en_details'                => $request->en_details,
            'ar_details'                => $request->ar_details,
            'status'                    => $request->status,
        ]);

        if(request()->hasFile('images'))
        {
            $all = '';
            foreach ($request->images as $img){
                $image = time() . '_' . $img->getClientOriginalName();
                $img->storeAs('/', "/public/deals/{$deal->id}/{$image}", '');
                $all .= $image.'/';
            }
            $deal->update(['images' =>  $all]);
        }

        return redirect()->route('dashboard.deals.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        return view('website.deals.edit',compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        return view('website.deals.edit',compact('deal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        $this->validate($request, Deal::rules($update = true, $deal->id));

        $deal->update([
            'en_title'                  => $request->en_title,
            'ar_title'                  => $request->ar_title,
            'en_description'            => $request->en_description,
            'ar_description'            => $request->ar_description,
            'en_details'                => $request->en_details,
            'ar_details'                => $request->ar_details,
            'status'                    => $request->status,
        ]);

        if(request()->hasFile('images'))
        {
            $all = '';
            foreach ($request->images as $img){
                $image = time() . '_' . $img->getClientOriginalName();
                $img->storeAs('/', "/public/deals/{$deal->id}/{$image}", '');
                $all .= $image.'/';
            }
            $deal->update(['images' =>  $all]);
        }

        return redirect()->route('dashboard.deals.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        Deal::destroy($deal->id);
        return redirect()->route('dashboard.deals.index')->with('success','Data deleted successfully');
    }
}
