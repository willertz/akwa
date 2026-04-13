<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'original_name',
        'filename',
        'path',
        'url',
        'thumbnail_url',
        'mime_type',
        'size',
        'width',
        'height',
        'alt',
        'folder',
    ];
}
