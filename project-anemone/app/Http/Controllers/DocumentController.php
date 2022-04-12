<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function upload(Request $request)
    {
        //validate

        //format
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = $request->file('image')->getClientOriginalName();
            $path = time().'-'.$name;
            
            $file->move(public_path('images'), $path);

            //store
            $request->user()->documents()->create([
            'path' => $path,
            'file_type' => $name,
            'name' => $name,
            ]);
        }
    }
}
