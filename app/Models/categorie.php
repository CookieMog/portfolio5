<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description'

    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_has_categories');
    }
}
