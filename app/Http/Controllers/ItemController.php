<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ShopCategory;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function getItemsByCatId($catId) {
        $items = Item::where('category','=',$catId)->orderBy("priority","asc")->get();
        if (!$items) {
            return false;
        }
        return $items;
    }

    public function getItemById($id) {
        $item = Item::where('id','=',$id)->first();

        if (!$item) {
            return false;
        }
        $item->category_url = $this->getCatUrlById($item->category);
        echo $item;
    }

    public function getCatUrlById($id) {
        $contr = new ShopCategoryController();
        $category = ShopCategory::where('id','=',$id)->first();
        $url = $contr->getUrlByCode($category->parent_id,$category->slug);
        return "https://akwagarant.ru" . $url;
    }

    public function parseItems($data) {
        return [
          'main' => $this->parseMainData($data),
          'subitems' => $this->parseChildData($data)
        ];
    }

    protected function parseMainData($data) {
        $res = [];
        foreach($data as $item) {
            if ($item->main_item == 1) {
                $res[$item->id] = $item;
            }
        }
        return $res;
    }

    protected function parseChildData($data) {
        $res = [];
        foreach ($data as $item) {
            if ($item->main_item == 0) {
                $res[$item->parent_id][] = $item;
            }
        }
        return $res;
    }

    public function getChildById($id) {
        return Item::where('parent_id','=',$id)->get() ? : null;
    }

    public function getCategoryIdByUrl($url) {
        $sections = explode('/',$url);
        unset($sections[0]);
        unset($sections[1]);
        unset($sections[2]);
        unset($sections[3]);
        $categoryController = new ShopCategoryController();
        $category = $categoryController->getCategoryByArray($sections);
        return $category->id;
    }

     public function saveItem(Request $request) {

             $item = Item::find($request->id);

             $item->art = $request->art;
             $item->name = $request->name;
             $item->price = $request->price;
             $item->priority = $request->priority;
             $item->price_usd = $request->price_usd;
             $item->price_eur = $request->price_eur;
             $item->category = $this->getCategoryIdByUrl($request->cat_url);

             if($request->parent_id && $request->parent_id != 0) {
                 $item->main_item = 0;
                 $item->parent_id= $request->parent_id;
             } else {
                 $item->main_item = 1;
                 $item->parent_id= 0;
             }

             $item->description = $request->description;
             $item->full_description = $request->full_description;
             $item->country = $request->country;
             $item->preview = $request->preview;
             $item->meta_title = $request->meta_title;
             $item->meta_description = $request->meta_description;
             $item->unit = $request->unit;
             echo $item->save();

    }

    public function deleteItem($id) {
        Item::find($id)->delete();
    }

    public function addNewItem(Request $request) {
        $art = $request->art ? : '';
        $name = $request->name;
        $price = $request->price;
        $price_usd = $request->price_usd;
        $price_eur = $request->price_eur;
        $description = $request->description;
        $full_description = $request->full_description;
        $country = $request->country;
        $preview = $request->preview;
        $priority = $request->priority;
        $meta_title = $request->meta_title;
        $meta_description = $request->meta_description;
        $category = $this->getCategoryIdByUrl($request->category);
        $majorId = $request->majorId ? : false;
        $item = new Item();
        $item->category = $category;
        $item->priority = $priority;
        $item->art = $art;
        $item->name = $name;
        $item->price = $price;
        $item->price_usd = $price_usd;
        $item->price_eur = $price_eur;
        $item->description = $description;
        $item->full_description = $full_description;
        $item->country = $country;
        $item->unit = $request->unit;
        if($majorId && $majorId != 0) {
            $item->main_item = 0;
            $item->parent_id= $majorId;
        } else {
            $item->main_item = 1;
            $item->parent_id= 0;
        }
        $item->preview = $preview;
        $item->meta_title = $meta_title;
        $item->meta_description = $meta_description;
        echo $item->save();
    }

    public function test() {
        $items = Item::all();
        foreach($items as $item) {
            echo $item->name . "<br>";
        }
    }

    public function loadAllItems() {
        return Item::select("name","category","priority","art","price","price_usd","price_eur","description","country")->get();
    }
}
