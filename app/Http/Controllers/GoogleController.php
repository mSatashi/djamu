<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use Socialite;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
 
    public function callback()
    {
 
        // jika user masih login lempar ke home
        if (Auth::check()) {
            return redirect('/home');
        }
 
        $oauthUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $oauthUser->email)->first();
        $google_user = User::where('google_id', $oauthUser->id)->first();
        if ($user) {
        	if ($google_user) {
        		Auth::loginUsingId($user->id);
        	} else {
        		$updateUser = User::where('id', $user->id)->update([
	                'google_id'=> $oauthUser->id,
	            ]);
	            Auth::loginUsingId($user->id);
        	}            
            return redirect('/toko');
        } else {
            $newUser = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'google_id'=> $oauthUser->id,
                'email_verified_at' => Carbon::now(),
                'level' => "Costumer",
                // password tidak akan digunakan ;)
                'password' => md5($oauthUser->token),
                'remember_token' => Str::random(10),
            ]);
            Auth::login($newUser);
            return redirect('/toko');
        }
    }
}
