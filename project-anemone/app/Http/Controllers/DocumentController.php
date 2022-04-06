<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::get();
        return view('documents', ['documents' => $documents]);
    }
    public function upload(Request $request)
    {
        $this->validate($request, ['path' => 'required']);
        $file = $request->file('path');

        $extension = $request->file('path')->extension();
        $name = $request->file('path')->getClientOriginalName();
        $path = time().'-'.$name;
        $test = $request->path->move(public_path('images'), $path);

        $request->user()->documents()->create([
            'path' => $path,
            'file_type' => $extension,
            'name' => $name,
        ]);

        return back();
    }
}
