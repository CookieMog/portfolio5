<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_1',
        'image_2',
        'image_3',
        'description',
        'url',
        'customer',
        'mission',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
