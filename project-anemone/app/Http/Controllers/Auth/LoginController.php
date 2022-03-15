<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller{
    public function index(){
        return view('login');
    }

    public function sign_in(Request $request){
        $this->validate($request, [
            //'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($request->only('email','password'))){
            return redirect()->route('dashboard');
        }
    }
}