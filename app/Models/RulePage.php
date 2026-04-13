<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RulePage extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'content',
        'seo_title',
        'seo_description',
    ];
}
