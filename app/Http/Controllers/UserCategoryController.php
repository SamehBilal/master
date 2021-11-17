<?php

namespace App\Http\Controllers;

use App\Models\UserCategory;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = UserCategory::all();
        return view('users.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, UserCategory::rules());

        $userCategory = UserCategory::create([
            'name'                  => $request->name,
            'description'           => $request->description,
            'model'                 => $request->model,
            'icon'                  => $request->icon,
            'status'                => $request->status,
        ]);

        return redirect()->route('user-categories.show',$userCategory->id)->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function show(UserCategory $userCategory)
    {
        return view('users.categories.edit',compact('userCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCategory $userCategory)
    {
        return view('users.categories.edit',compact('userCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCategory $userCategory)
    {
        $this->validate($request, UserCategory::rules($update = true, $userCategory->id));

        $userCategory->update([
            'name'                  => $request->name,
            'description'           => $request->description,
            'model'                 => $request->model,
            'icon'                  => $request->icon,
            'status'                => $request->status,
        ]);

        return redirect()->route('user-categories.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCategory $userCategory)
    {
        UserCategory::destroy($userCategory->id);
        return redirect()->route('user-categories.index')->with('success','Data deleted successfully');
    }
}
