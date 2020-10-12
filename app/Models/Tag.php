<?php

namespace App\Models;

use App\NewsItem;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function newsItems() {
        return $this->belongsToMany(NewsItem::class);
    }
}

