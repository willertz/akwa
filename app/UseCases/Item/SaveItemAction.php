<?php

declare(strict_types=1);

namespace App\UseCases\Item;

use App\Models\Item;
use App\Services\CategoryService;

readonly class SaveItemAction
{
    public function __construct(private CategoryService $categoryService) {}

    public function execute(array $data): Item
    {
        $item = isset($data['id']) ? Item::findOrFail((int) $data['id']) : new Item;

        $categoryUrl = $data['cat_url'] ?? $data['category'] ?? '';
        $categoryId = $this->categoryService->getCategoryIdByUrl((string) $categoryUrl);

        $parentId = $data['parent_id'] ?? $data['majorId'] ?? 0;

        $item->fill([
            'art' => $data['art'] ?? '',
            'name' => $data['name'],
            'price' => $data['price'] ?? '',
            'priority' => $data['priority'] ?? 0,
            'price_usd' => $data['price_usd'] ?? '',
            'price_eur' => $data['price_eur'] ?? '',
            'category' => $categoryId,
            'main_item' => ($parentId !== 0) ? 0 : 1,
            'parent_id' => $parentId,
            'description' => $data['description'] ?? '',
            'full_description' => $data['full_description'] ?? '',
            'country' => $data['country'] ?? '',
            'preview' => $data['preview'] ?? '',
            'meta_title' => $data['meta_title'] ?? '',
            'meta_description' => $data['meta_description'] ?? '',
            'unit' => $data['unit'] ?? '',
        ]);
        if (! empty($data['slug'])) {
            $item->slug = $data['slug'];
        }

        $item->save();

        return $item;
    }
}
