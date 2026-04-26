<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\CurrencyService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ShopCategory extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name', 'slug', 'preview', 'title', 'description', 'depth_level', 'priority', 'parent_id',
    ];

    /**
     * Get minimum price for products in this category and its children
     */
    public function getMinPrice(): ?float
    {
        $categoryIds = [$this->id];

        // Get children IDs (recursive would be better, but let's start with 1 level or use a flat approach if possible)
        // For simplicity in this project, we check direct items first.

        $items = Item::whereIn('category', $categoryIds)->get();
        if ($items->isEmpty()) {
            // Check subcategories items
            foreach ($this->children as $child) {
                $categoryIds[] = $child->id;
            }
            $items = Item::whereIn('category', $categoryIds)->get();
        }

        if ($items->isEmpty()) {
            return null;
        }

        $currency = app(CurrencyService::class);
        $minPrice = null;

        foreach ($items as $item) {
            $price = null;
            if ($item->price) {
                $price = (float) $item->price;
            } elseif ($item->price_usd) {
                $price = $currency->convertToRub('USD', (float) $item->price_usd);
            } elseif ($item->price_eur) {
                $price = $currency->convertToRub('EUR', (float) $item->price_eur);
            }

            if ($price !== null) {
                if ($minPrice === null || $price < $minPrice) {
                    $minPrice = $price;
                }
            }
        }

        return $minPrice;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * @return HasMany<Item, ShopCategory>
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'category', 'id');
    }

    /**
     * @return HasMany<ShopCategory, ShopCategory>
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * @return Collection<int, ShopCategory>
     */
    public static function getRootCategories(): Collection
    {
        return self::where('parent_id', 0)->get();
    }

    /**
     * Resolve category by path array
     */
    public static function resolveByPath(array $path): ?self
    {
        $parentId = 0;
        $category = null;
        foreach ($path as $slug) {
            $category = self::where('slug', $slug)->where('parent_id', $parentId)->first();
            if (! $category) {
                return null;
            }
            $parentId = $category->id;
        }

        return $category;
    }

    /**
     * Get full URL for category
     */
    public function getUrl(): string
    {
        $chains = [$this->slug];
        $parent = $this;
        while ($parent->parent_id != 0) {
            $parent = self::find($parent->parent_id);
            if (! $parent) {
                break;
            }
            $chains[] = $parent->slug;
        }

        return url('/internet-magazin/'.implode('/', array_reverse($chains)));
    }
}
