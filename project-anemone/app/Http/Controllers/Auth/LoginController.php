<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller{
    public static function sign_in(Request $request){
        $request->validate([
            //'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        //tokenize
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('user')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }
}