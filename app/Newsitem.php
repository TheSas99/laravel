<?php

namespace App;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    public $fillable = ['title', 'description', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
