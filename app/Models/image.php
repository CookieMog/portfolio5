<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class image extends Model
{
    protected $table = 'Misc';
    use HasFactory;
    protected $fillable = [

        'image',

    ];
}
