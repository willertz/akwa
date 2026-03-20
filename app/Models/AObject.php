<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AObject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'title', 'preview_pict', 'description', 'slider_hash', 'content'];
}
