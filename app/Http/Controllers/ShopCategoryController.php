<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCategoryRequest;
use App\Models\ShopCategory;

class ShopCategoryController extends Controller
{
    public function getRootCategory()
    {
        return ShopCategory::where('parent_id', '=', '-1')->get();
    }

    public function getCategoryBySlug($slug)
    {
        $category = ShopCategory::where('slug', '=', $slug)->first();

        return [
            'id' => $category['id'],
            'name' => $category['name'],
        ];
    }

    public function getSlugByArray($arr)
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

    public function getNaviById($id)
    {
        $category = ShopCategory::where('id', '=', $id)->first();

        return ['name' => $category->name, 'slug' => 'https://akwagarant.ru/catalog/'.$category->slug];

    }

    public function getUrlByCode($id, $code)
    {
        $chains = [];
        $chains[] = $code;
        $parentId = $id;
        if ($id == -1) {
            return '/catalog/'.$code;
        } else {
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

    public function addNewCat(ShopCategoryRequest $request): void
    {
        $category = new ShopCategory;

        $name = $request->validated('name');
        $title = $request->validated('title') ?: $request->validated('name');
        $preview = $request->validated('preview');
        $description = $request->validated('description');
        $priority = $request->validated('priority', 0);
        $parent_id = $request->validated('parent_id');
        $depth_level = ($this->getCategoryLevelById($request->validated('papent_id') ?? $parent_id)->depth_level ?? 0) + 1;

        $category->name = $name;
        $category->title = $title;
        $category->preview = $preview;
        $category->description = $description;
        $category->priority = $priority;
        $category->parent_id = $parent_id;
        $category->depth_level = $depth_level;

        echo $category->save();
    }

    public function updateCat(ShopCategoryRequest $request): void
    {
        $category = ShopCategory::find($request->validated('id'));
        $category->name = $request->validated('name');
        $category->preview = $request->validated('preview');
        $category->title = $request->validated('title');
        $category->description = $request->validated('description');
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
