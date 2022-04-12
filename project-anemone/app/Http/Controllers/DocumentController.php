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
            Document::create([
            'path' => $path,
            'file_type' => $name,
            'name' => $name,
            'user_id' => auth()->id()
            ]);
        }

        $response = [
            'name' => $name,
            'path' => $path
        ];

        return response($response, 201);
    }

    public function display($user_id, $id)
    {
        return Document::where([
            'id' => $id,
            'user_id' => $user_id
        ])->first();
    }
}
