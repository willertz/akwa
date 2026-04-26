<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Item extends Model
{
    use HasFactory, HasSlug;

    public $url;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected $fillable = [
        'category', 'priority', 'art', 'name', 'slug', 'price', 'price_usd', 'price_eur',
        'description', 'full_description', 'country', 'main_item', 'parent_id',
        'preview', 'meta_title', 'meta_description',
        'unit',
    ];

    /**
     * @return HasMany<Item, Item>
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * Get parent and children grouped for category display
     *
     * @return array{main: Collection<int, Item>, subitems: array<int, Collection<int, Item>>}
     */
    public static function getGroupedByCategory(int $categoryId, ?string $sort = null): array
    {
        $query = self::where('category', $categoryId);

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('priority', 'asc');
                break;
        }

        $all = $query->get();

        return [
            'main' => $all->filter(fn ($item) => $item->main_item == 1 || $item->main_item === null || $item->main_item === '')->keyBy('id'),
            'subitems' => $all->where('main_item', 0)->groupBy('parent_id'),
        ];
    }
}
