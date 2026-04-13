<?php

declare(strict_types=1);

namespace App\Models;

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
