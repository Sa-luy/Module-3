<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

use Validator,Redirect,Response,File;

// use Socialite;

use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller

{

public function redirect($provider)

{

    return Socialite::driver($provider)->redirect();

}

 

public function callback($provider)

{

           

    $getInfo = Socialite::driver($provider)->user();

     

    $user = $this->createUser($getInfo,$provider);

 

    Auth::guard('customer')->login($user);

 

    return redirect()->route('customer.home');

 

}

function createUser($getInfo,$provider){

    try {
        $user = Customer::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user =new Customer();

            $user->name  = $getInfo->name;
            $user->email    = $getInfo->email;
            $user->provider_name = $provider;
            $user->provider_id = $getInfo->id;
            $user->phone = $getInfo->id;
            $user->address = 'Viet Nam';
            $user->phone = $getInfo->id;
            $user->password = Hash::make($getInfo->id);
            $user->avatar = $getInfo->avatar;
            $user->save();
        }
    } catch (Exception $e) {
          Log::error('messages' . $e->getMessage() . '---Line' . $e->getLine());
  }

  return $user;
}

}
