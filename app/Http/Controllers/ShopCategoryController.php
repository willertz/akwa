<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ShopCategoryRequest;
use App\Models\ShopCategory;
use App\UseCases\ShopCategory\SaveShopCategoryAction;
use Illuminate\Http\JsonResponse;

class ShopCategoryController extends Controller
{
    public function __construct(
        private readonly SaveShopCategoryAction $saveShopCategoryAction
    ) {}

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

        return ['name' => $category->name, 'slug' => url('/catalog/'.$category->slug)];

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

    public function getAllCategory(): JsonResponse
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

        return response()->json($res);
    }

    public function getCategoryLevelById($id)
    {
        return ShopCategory::where('id', '=', $id)->first();
    }

    public function addNewCat(ShopCategoryRequest $shopCategoryRequest): JsonResponse
    {
        $shopCategory = $this->saveShopCategoryAction->execute($shopCategoryRequest->validated());

        return response()->json($shopCategory->exists);
    }

    public function updateCat(ShopCategoryRequest $shopCategoryRequest): JsonResponse
    {
        $shopCategory = $this->saveShopCategoryAction->execute($shopCategoryRequest->validated());

        return response()->json($shopCategory->exists);
    }

    public function deleteCategory($id): JsonResponse
    {
        $category = ShopCategory::find($id);
        if (! $category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category->delete());
    }

    public function loadSingleCat($id): JsonResponse
    {
        $category = ShopCategory::where('id', '=', $id)->first();
        if (! $category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category);
    }
}
