<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class IndexController extends Controller{
    public function index(){
        dd(auth()->user());
        return view('index');
    }
}