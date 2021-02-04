<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialController extends Controller
{
    public function login($provider)
    {
        //dd($provider);
        if (\Auth::id()) {
            //dd($provider);
            return redirect()->back();
        }
        //dd('Hello');›Tot 
        return Socialite::driver($provider)->redirect();

    }

    public function response($provider)
    {
        //dd($provider);
        $user = Socialite::driver($provider)->user();
        dd($user);
        $ownUser = User::query()
            ->where('id_in_soc', $user->getId())
            ->where('type_auth', $provider)
            ->first(); 
        //dd($ownUser);
        
        if (is_null($ownUser)) {
            $ownUser = new User();
            $ownUser->fill([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => null,
                'id_in_soc' => $user->getId(),
                'type_auth' => $provider,
                'avatar' => $user->getAvatar(),
            ])->save();
            //dd($ownUser);
        }
        \Auth::login($ownUser);
        return redirect()->route('admin_news');
    }
}
