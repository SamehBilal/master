<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $categories = UserCategory::where('business_user_id',$user->id)
                ->orderBy('updated_at','desc')
                ->get();
        }else{
            $categories = UserCategory::orderBy('updated_at','desc')
                ->get();
        }
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

        $user_id = auth()->user()->id;

        $userCategory = UserCategory::create([
            'name'                  => $request->name,
            'description'           => $request->description,
            'model'                 => $request->model,
            'status'                => $request->status,
            'business_user_id'      => $user_id,
        ]);

        return redirect()->route('dashboard.user-categories.index')->with('success','Data created successfully');
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

        $user_id = auth()->user()->id;

        $userCategory->update([
            'name'                  => $request->name,
            'description'           => $request->description,
            'model'                 => $request->model,
            'status'                => $request->status,
            'business_user_id'      => $user_id,
        ]);

        return redirect()->route('dashboard.user-categories.index')->with('success','Data updated successfully');
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
        return redirect()->route('dashboard.user-categories.index')->with('success','Data deleted successfully');
    }
}
