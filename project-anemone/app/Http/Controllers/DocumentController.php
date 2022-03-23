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
        $this->validate($request, ['file_metadata' => 'required']);
        $data = json_encode($request->file_metadata); //Turns everything passed as file_metadata into json
        $request->user()->documents()->create([
            'file_metadata' => $data
        ]);

        return back();
    }
}
