<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;

class ProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleProviderCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->user();

            $finduser = User::where('provider_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/');

            }else{

                $findemail = User::where('email', $user->email)->first();

                if($findemail){

                    $form_data = array(
                        'provider_id'       => $user->id,
                        'provider'          => $provider,
                    );

                    User::whereId($findemail->id)->update($form_data);

                    Auth::login($findemail);

                }else{
                    $newUser = User::create([
                        'name'              => $user->name,
                        'email'             => $user->email,
                        'provider_id'       => $user->id,
                        'provider'          => $provider,
                        'ip'                => request()->ip(),
                        'email_verified_at' => now(),
                        'password'          => encrypt('123456789')
                    ]);

                    Auth::login($newUser);



                    $user = User::find(auth()->user()->id);
                    if(Customer::where('user_id',auth()->user()->id)->count()){
                        //
                    }else{
                        $customer = auth()->user()->customer()->create([
                            'name' => auth()->user()->name,
                            'email' => auth()->user()->email,
                            'user_id' => $user->id,
                        ]);
                    }
                }
                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
