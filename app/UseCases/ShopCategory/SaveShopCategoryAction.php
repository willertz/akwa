<?php

declare(strict_types=1);

namespace App\UseCases\ShopCategory;

use App\Models\ShopCategory;

class SaveShopCategoryAction
{
    public function execute(array $data): ShopCategory
    {
        $category = isset($data['id']) ? ShopCategory::findOrFail($data['id']) : new ShopCategory;

        $fillData = [
            'name' => $data['name'],
            'title' => $data['title'] ?? $data['name'],
            'preview' => $data['preview'] ?? '',
            'description' => $data['description'] ?? '',
            'priority' => $data['priority'] ?? 0,
        ];

        if (! $category->exists) {
            $parentId = $data['parent_id'] ?? -1;
            $parentCategory = ShopCategory::find($parentId);
            $depthLevel = ($parentCategory ? $parentCategory->depth_level : 0) + 1;

            $fillData['parent_id'] = $parentId;
            $fillData['depth_level'] = $depthLevel;
        }

        $category->fill($fillData);
        $category->save();

        return $category;
    }
}
