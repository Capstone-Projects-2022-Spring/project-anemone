<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller{
    //probably can remove this
    public function index(){
        return view('login');
    }

    public function sign_in(Request $request){
        $this->validate($request, [
            //'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
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