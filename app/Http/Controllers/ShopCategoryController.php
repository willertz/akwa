<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ShopCategoryRequest;
use App\Models\ShopCategory;

class ShopCategoryController extends Controller
{
    public function getRootCategory()
    {
        return ShopCategory::where('parent_id', '=', '-1')->get();
    }

    public function getCategoryBySlug($slug): array
    {
        $category = ShopCategory::where('slug', '=', $slug)->first();

        return [
            'id' => $category['id'],
            'name' => $category['name'],
        ];
    }

    /**
     * @return array{name: mixed, slug: mixed}[]
     */
    public function getSlugByArray($arr): array
    {

        $res = [];
        $parentId = null;
        foreach ($arr as $slug) {

            if ($parentId) {
                $category = ShopCategory::where('slug', '=', $slug)->where('parent_id', '=', $parentId)->first();
            } else {
                $category = ShopCategory::where('slug', '=', $slug)->first();
            }
            $parentId = $category->id;
            $res[] = ['name' => $category->name, 'slug' => $slug];
        }

        return $res;
    }

    public function getCategoryByArray($arr)
    {
        $parentId = null;
        $categoryR = null;
        foreach ($arr as $slug) {
            if ($parentId) {
                $category = ShopCategory::where('slug', '=', $slug)->where('parent_id', '=', $parentId)->first();
            } else {
                $category = ShopCategory::where('slug', '=', $slug)->first();
            }
            $parentId = $category->id;
            $categoryR = $category;
        }

        return $categoryR;
    }

    public function getCategoryByParentId($id): bool
    {
        $categories = ShopCategory::where('parent_id', '=', $id)->get();
        if (! $categories) {
            return false;
        }

        return $categories;
    }

    public function getNaviById($id): array
    {
        $category = ShopCategory::where('id', '=', $id)->first();

        return ['name' => $category->name, 'slug' => 'https://akwagarant.ru/catalog/'.$category->slug];

    }

    public function getUrlByCode($id, string $code): string|false
    {
        $chains = [];
        $chains[] = $code;
        $parentId = $id;
        if ($id == -1) {
            return '/catalog/'.$code;
        }
        while (true) {
            $category = ShopCategory::where('id', '=', $parentId)->first();
            if (! $category) {
                return false;
            }
            if ($category->parent_id == -1) {
                break;
            }
            $chains[] = $category->slug;
            $parentId = $category->parent_id;

        }

        return '/catalog/'.implode('/', array_reverse($chains));
    }

    public function getAllCategory(): void
    {
        $categories = ShopCategory::all();
        $res = [];
        foreach ($categories as $category) {
            if ($category->parent_id != -1) {
                $url = $this->getUrlByCode($category->parent_id, $category->slug);
            } else {
                $url = '/catalog/'.$category->slug.'/';
            }
            $res[] = [
                'name' => $category->name,
                'id' => $category->id,
                'url' => $url,
            ];

        }

        echo json_encode($res);
    }

    public function getCategoryLevelById($id)
    {
        return ShopCategory::where('id', '=', $id)->first();
    }

    public function addNewCat(ShopCategoryRequest $shopCategoryRequest): void
    {
        $shopCategory = new ShopCategory;

        $name = $shopCategoryRequest->validated('name');
        $title = $shopCategoryRequest->validated('title') ?: $shopCategoryRequest->validated('name');
        $preview = $shopCategoryRequest->validated('preview');
        $description = $shopCategoryRequest->validated('description');
        $priority = $shopCategoryRequest->validated('priority', 0);
        $parent_id = $shopCategoryRequest->validated('parent_id');
        $depth_level = ($this->getCategoryLevelById($shopCategoryRequest->validated('papent_id') ?? $parent_id)->depth_level ?? 0) + 1;

        $shopCategory->name = $name;
        $shopCategory->title = $title;
        $shopCategory->preview = $preview;
        $shopCategory->description = $description;
        $shopCategory->priority = $priority;
        $shopCategory->parent_id = $parent_id;
        $shopCategory->depth_level = $depth_level;

        echo $shopCategory->save();
    }

    public function updateCat(ShopCategoryRequest $shopCategoryRequest): void
    {
        $category = ShopCategory::find($shopCategoryRequest->validated('id'));
        $category->name = $shopCategoryRequest->validated('name');
        $category->preview = $shopCategoryRequest->validated('preview');
        $category->title = $shopCategoryRequest->validated('title');
        $category->description = $shopCategoryRequest->validated('description');
        echo $category->save();
    }

    public function deleteCategory($id): void
    {
        echo ShopCategory::find($id)->delete();
    }

    public function loadSingleCat($id): void
    {
        echo ShopCategory::where('id','=',$id)->first();
    }
}
