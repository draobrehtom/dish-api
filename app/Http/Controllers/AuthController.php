<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request) {
        if($request->has('email', 'password')) {
            $email = $request->get('email');
            $password = $request->get('password');
            $users = User::where('email', $email)->get();

            if(!is_null($users)){
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    $user = User::where(['email'=>$email]);
                    $access_token = str_random(60);
                    $user->update(['access_token'=>$access_token]);
                    return $access_token;
                }
            }else{
                response('', 401);
            }
        }else{
            response('', 401);
        }
    }
}
