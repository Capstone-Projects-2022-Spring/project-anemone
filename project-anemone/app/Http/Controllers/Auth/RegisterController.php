<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller{
    //Probably can remove this
    public function index(){
        return view('register');
    }

    public function register_user(Request $request){
        //validate
        $this->validate($request, [
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

        event(new Registered($user)); //Might be able to remove this? It exists for current email validation but that probably needs to be changed
        
        //tokenize
        $token = $user->createToken('user')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}