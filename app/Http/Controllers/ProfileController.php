<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('setup.settings.profile',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

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
            'bio'                   => $request->bio,
        ]);

        if(request()->hasFile('avatar'))
        {
            $image = time() . '_' . request()->file('avatar')->getClientOriginalName();
            request()->file('avatar')->storeAs('/public', "/user/{$user->id}/{$image}", '');
            $user->update(['avatar' =>  $image]);
        }

        return redirect()->route('dashboard.settings.profile')->with('success','Data updated successfully');
    }
}
