<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'category', 'priority', 'art', 'name', 'price', 'price_usd', 'price_eur',
        'description', 'full_description', 'country', 'main_item', 'parent_id',
        'preview', 'meta_title', 'meta_description',
    ];

    public $url;
}
