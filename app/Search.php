<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public $fillable = ['title', 'description', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
