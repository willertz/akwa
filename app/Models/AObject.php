<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AObject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title', 'preview_pict', 'description', 'slider_hash', 'content'];

    /**
     * @return Collection<int, AObject>
     */
    public static function getLatest4(): Collection
    {
        return self::where(static function (Builder $builder): void {
            $builder->whereNotIn('id', [100, 98])
                ->orderBy('id', 'desc')
                ->limit(4);
        })
            ->orWhereIn('id', [91, 89])
            ->orderByRaw('
                CASE
                    WHEN id IN (91, 89) THEN 0
                    ELSE 1
                END,
                id DESC
            ')
            ->limit(4)
            ->get();
    }

    /**
     * @return string[]
     */
    public function getSliderUrls(): array
    {
        return Slider::where('slider_hash', $this->slider_hash)
            ->pluck('url')
            ->toArray();
    }
}
