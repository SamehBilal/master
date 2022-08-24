<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCategory;
use App\Notifications\NewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::orderBy('updated_at','desc');
        if($user->hasRole('finance'))
        {
            $users = $users->whereHas("roles", function($q){ $q->where("name", "operation admin"); });
        }
        if($user->hasRole('operation admin'))
        {
            $users = $users->whereHas("roles", function($q){ $q->where("name", "operation logistics"); });
        }
        if($user->hasRole('operation logistics'))
        {
            $users = $users->whereHas("roles", function($q){ $q->where("name", "operation courier"); });
        }

        $users = $users->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',compact('roles'));
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

        if($request->role)
        {
            $user->assignRole($request->role);
        }

        $users = User::whereHas("roles", function($q){
            $q->where("name", "Super Admin")
                ->orWhere("name", "admin")
                ->orWhere("name", "sales");
        })->get();
        Notification::send($users, new NewUser($user));

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
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
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

        if($request->role)
        {
            $user->roles()->detach();
            $user->assignRole($request->role);
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

    public function login($id)
    {
        $user = User::find($id);
        $user->loadCount('roles');

        if($user->roles_count < 1)
        {
            return redirect()->back();
        }
        if($id == Auth::user()->id)
        {
            return redirect()->back();
        }
        Auth::logout();
        Auth::loginUsingId($id, true);

        return redirect('dashboard');
    }
}
