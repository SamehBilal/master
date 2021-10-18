<?php

namespace App\Traits;

trait Verified {
    public function __construct()
    {
        /*if (Auth::check()) {
            $user = User::find(auth()->user()->id);
            if ($user->hasVerifiedEmail()) {

            } else {
                return redirect()->route('verification.notice');
            }
        }*/
        $this->middleware(['auth'/*,'verified'*/]);
    }
}

