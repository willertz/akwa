<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\ShopCategory;

class CategoryService
{
    public function getCategoryIdByUrl(string $url): int
    {
        $sections = explode('/', $url);
        // Remove empty strings from explode and fix indices
        $sections = array_values(array_filter($sections));

        // The original code skipped 0, 1, 2, 3 segments.
        // Example: /catalog/cat1/cat2/cat3
        // Sections: ['catalog', 'cat1', 'cat2', 'cat3']
        // If it was meant to skip /catalog/ and maybe some other parts.

        // Let's look at ShopCategory::resolveByPath logic.
        $path = $sections;
        if (isset($path[0]) && $path[0] === 'catalog') {
            array_shift($path);
        }

        $category = ShopCategory::resolveByPath($path);

        return $category->id ?? 0;
    }

    public function getCatUrlById(int $id): string
    {
        $category = ShopCategory::find($id);

        return $category ? $category->getUrl() : '';
    }
}
