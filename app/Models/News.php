<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // fillable fields
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'slug',
        'content'
    ];

    // function relationship with category
    public function category(){
        // one to many relationship using belongsTo
        return $this->belongsTo(Category::class);
    }

    // Accessor Image News
    // Berfungsi untuk memperoleh url image
    // Dari direktori storage/news
    public function image() : Attribute{
        return Attribute::make(
            get: fn($value) => asset('/storage/news/' . $value)
        );
    }
}
