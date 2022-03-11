<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller{
    public function index(){
        return view('checkout-1');
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
        User::create([
        'name' => $request->name,
        //'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);
        
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //redirect
        return redirect()->route('index');
    }
}