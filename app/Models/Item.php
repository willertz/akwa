<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'category', 'priority', 'art', 'name', 'price', 'price_usd', 'price_eur',
        'description', 'full_description', 'country', 'main_item', 'parent_id',
        'preview', 'meta_title', 'meta_description',
    ];

    public $url;
}
