<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        return view('documents');
    }
    public function upload(Request $request)
    {
        //dd($request);
        $this->validate($request, ['file_metadata' => 'required']);
        $data = json_encode($request->file_metadata);
        $request->user()->documents()->create([
            'file_metadata' => $data
        ]);

        return back();
    }
}
