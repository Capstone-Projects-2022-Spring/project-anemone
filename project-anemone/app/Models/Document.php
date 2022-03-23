<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    //Will probably have to fill out everything in the documents table as fillable or guarded but this works for now
    protected $fillable = [
        'file_metadata',
        'user_id'
    ];
}

