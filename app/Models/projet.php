<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


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
    public function addTags(array $tagIds)
    {
        $this->tags()->attach($tagIds);
        return $this->tags;
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'projet_has_tags');
    }

    public function addCategory(array $categoryIds)
    {
        $this->category()->attach($categoryIds);
        return $this->category;
    }
    public function category()
    {
        return $this->belongsToMany(Categorie::class, 'projet_has_categories');
    }
}
