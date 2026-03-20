<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Item extends Model
{
    use HasFactory;

    public $url;

    protected $fillable = [
        'category', 'priority', 'art', 'name', 'price', 'price_usd', 'price_eur',
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
    public static function getGroupedByCategory(int $categoryId): array
    {
        $all = self::where('category', $categoryId)->orderBy('priority', 'asc')->get();

        return [
            'main' => $all->where('main_item', 1)->keyBy('id'),
            'subitems' => $all->where('main_item', 0)->groupBy('parent_id'),
        ];
    }
}
