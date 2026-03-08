<?php

namespace App\Http\Controllers;

use App\ShopCategory;
use Illuminate\Http\Request;


class ShopCategoryController extends Controller
{
    public function getRootCategory() {
        $categories = ShopCategory::where('parent_id', "=", '-1')->get();

        return $categories;
    }

    public function getCategoryBySlug($slug) {
        $category = ShopCategory::where('slug','=',$slug)->first();
        return [
            'id' => $category['id'],
            'name' => $category['name']
        ];
    }

    public function getSlugByArray($arr) {
        
        $res = [];
        $parentId = null;
    foreach($arr as $slug) {
        
        if ($parentId) {
            $category = ShopCategory::where('slug','=',$slug)->where('parent_id','=',$parentId)->first();
        } else {
            $category = ShopCategory::where('slug','=',$slug)->first();
        }
        $parentId = $category->id;
        $res[] = ['name' => $category->name,'slug'=>$slug];
    }
        return $res;
    }
    
    
    public function getCategoryByArray($arr) {
        $parentId = null;
        $categoryR = null;
    foreach($arr as $slug) {
        if ($parentId) {
            $category = ShopCategory::where('slug','=',$slug)->where('parent_id','=',$parentId)->first();
        } else {
            $category = ShopCategory::where('slug','=',$slug)->first();
        }
        $parentId = $category->id;
        $categoryR = $category;
    }
    return $categoryR;
    }
    public function getCategoryByParentId($id) {
        $categories = ShopCategory::where('parent_id','=',$id)->get();
        if (!$categories) {
            return false;
        }
        return $categories;
    }

   public function getNaviById($id) {
    $res = [];
    $category = ShopCategory::where('id','=',$id)->first();
    $res = ['name' => $category->name,'slug'=>"https://akwagarant.ru/catalog/" . $category->slug];
    return $res;
    
   }
    public function getUrlByCode($id, $code) {
        $chains = [];
        $chains[] = $code;
        $parentId = $id;
        if($id == -1) {
            return '/catalog/' . $code;
        } else {
            while(true) {
                $category = ShopCategory::where('id','=',$parentId)->first();
                if (!$category) {
                    return false;
                }
                if ($category->parent_id == -1) {
                    break;
                }
                $chains[] = $category->slug;
                $parentId = $category->parent_id;

            }
        }

        $uri = '/catalog/' . implode('/',array_reverse($chains));
        return $uri;
    }

    public function getAllCategory() {
        $categories =  ShopCategory::all();
        $res = [];
        foreach($categories as $category) {
            if ($category->parent_id != -1) {
                $url = $this->getUrlByCode($category->parent_id,$category->slug);
            } else {
                $url = '/catalog/' . $category->slug . '/';
            }
            $res[] = [
                'name' => $category->name,
                'id'  => $category->id,
                'url' => $url
            ];

        }

        print json_encode($res);
    }

    public function getCategoryLevelById($id) {
        return $category = ShopCategory::where('id','=',$id)->first();
    }


    public function addNewCat(Request $request) {
        $category = new ShopCategory();

        $name = $request->name;
        $title = $request->title ? : $request->name;
        $preview = $request->preview;
        $description = $request->description;
        $priority = 0;
        $parent_id = $request->parent_id;
        $depth_level = $this->getCategoryLevelById($request->papent_id) + 1;

        $category->name = $name;
        $category->title = $title;
        $category->preview = $preview;
        $category->description = $description;
        $category->priority = $priority;
        $category->parent_id = $parent_id;
        $category->depth_level = $depth_level;

        echo $category->save();
    }

    public function updateCat(Request $request) {
        $category = ShopCategory::find($request->id);
        $category->name = $request->name;
        $category->preview = $request->preview;
        $category->title = $request->title;
        $category->description = $request->description;
        echo $category->save();
    }

    public function deleteCategory($id) {
        echo ShopCategory::find($id)->delete();
    }

    public function loadSingleCat($id) {
        echo ShopCategory::where('id','=',$id)->first();
    }
}
