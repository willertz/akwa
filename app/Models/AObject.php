<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AObject extends Model
{
    protected $fillable = ['name', 'title', 'preview_pict', 'description', 'slider_hash', 'content'];
}
