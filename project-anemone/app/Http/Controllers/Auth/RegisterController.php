<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller{
    public function register_user(Request $request){
        //validate
        $request->validate([
            'name' => 'required|max:255',
            //'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        //store
        $user = User::create([
        'name' => $request->name,
        //'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);
        //tokenize
        $token = $user->createToken('user')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}