<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('users.profile',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, User::rules($update = true, $user->id));

        $user->update([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'username'              => $request->username,
            'password'              => $request->password,
            'gender'                => $request->gender,
            'religion'              => $request->religion,
            'date_of_birth'         => $request->date_of_birth,
            'phone'                 => $request->phone,
            'other_phone'           => $request->other_phone,
        ]);

        if(request()->hasFile('avatar'))
        {
            $image = time() . '_' . request()->file('avatar')->getClientOriginalName();
            request()->file('avatar')->storeAs('/', "/user/{$image}", '');
            $user->auth()->user()->update(['avatar' =>  $image]);
        }

        return redirect()->route('profile.show',$user->id)->with('success','Data updated successfully');
    }
}
