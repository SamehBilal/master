<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('updated_at','desc')->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, User::rules());

        $user = User::create([
            'first_name'            => $request->first_name,
            'last_name'             => $request->last_name,
            'full_name'             => $request->full_name,
            'email'                 => $request->email,
            'other_email'           => $request->other_email,
            'username'              => $request->username,
            'password'              => $request->password,
            'gender'                => $request->gender,
            'religion'              => $request->religion,
            'date_of_birth'         => $request->date_of_birth,
            'phone'                 => $request->phone,
            'other_phone'           => $request->other_phone,
            'status'                => $request->status,
            'bio'                   => $request->bio,
        ]);

        if(request()->hasFile('avatar'))
        {
            $image = time() . '_' . request()->file('avatar')->getClientOriginalName();
            request()->file('avatar')->storeAs('/', "/user/{$user->id}/{$image}", '');
            $user->auth()->user()->update(['avatar' =>  $image]);
        }

        return redirect()->route('dashboard.users.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
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
            'status'                => $request->status,
            'bio'                   => $request->bio,
        ]);

        if(request()->hasFile('avatar'))
        {
            $image = time() . '_' . request()->file('avatar')->getClientOriginalName();
            request()->file('avatar')->storeAs('/', "/user/{$user->id}/{$image}", '');
            $user->auth()->user()->update(['avatar' =>  $image]);
        }

        return redirect()->route('dashboard.users.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('dashboard.users.index')->with('success','Data deleted successfully');
    }
}
