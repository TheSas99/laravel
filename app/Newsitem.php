<?php

namespace App;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

/**
 * App\NewsItem
 *
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem query()
 * @mixin \Eloquent
 * @property-read \App\Category $category
 */
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
