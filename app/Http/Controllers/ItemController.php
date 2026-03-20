<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\ShopCategory;

class ItemController extends Controller
{
    public function getItemsByCatId($catId): bool
    {
        $items = Item::where('category', '=', $catId)->orderBy('priority', 'asc')->get();
        if (! $items) {
            return false;
        }

        return $items;
    }

    public function getItemById($id): ?bool
    {
        $item = Item::where('id', '=', $id)->first();

        if (! $item) {
            return false;
        }
        $item->category_url = $this->getCatUrlById($item->category);
        echo $item;
    }

    public function getCatUrlById($id): string
    {
        $contr = new ShopCategoryController;
        $category = ShopCategory::where('id', '=', $id)->first();
        $url = $contr->getUrlByCode($category->parent_id, $category->slug);

        return 'https://akwagarant.ru'.$url;
    }

    public function parseItems($data): array
    {
        return [
            'main' => $this->parseMainData($data),
            'subitems' => $this->parseChildData($data),
        ];
    }

    protected function parseMainData($data): array
    {
        $res = [];
        foreach ($data as $item) {
            if ($item->main_item == 1) {
                $res[$item->id] = $item;
            }
        }

        return $res;
    }

    protected function parseChildData($data): array
    {
        $res = [];
        foreach ($data as $item) {
            if ($item->main_item == 0) {
                $res[$item->parent_id][] = $item;
            }
        }

        return $res;
    }

    public function getChildById($id)
    {
        return Item::where('parent_id', '=', $id)->get() ?: null;
    }

    public function getCategoryIdByUrl($url)
    {
        $sections = explode('/', $url);
        unset($sections[0]);
        unset($sections[1]);
        unset($sections[2]);
        unset($sections[3]);
        $categoryController = new ShopCategoryController;

        return $categoryController->getCategoryByArray($sections)->id;
    }

    public function saveItem(ItemRequest $request): void
    {

        $item = Item::find($request->validated('id'));

        $item->art = $request->validated('art');
        $item->name = $request->validated('name');
        $item->price = $request->validated('price');
        $item->priority = $request->validated('priority');
        $item->price_usd = $request->validated('price_usd');
        $item->price_eur = $request->validated('price_eur');
        $item->category = $this->getCategoryIdByUrl($request->validated('cat_url'));

        if ($request->validated('parent_id') && $request->validated('parent_id') != 0) {
            $item->main_item = 0;
            $item->parent_id = $request->validated('parent_id');
        } else {
            $item->main_item = 1;
            $item->parent_id = 0;
        }

        $item->description = $request->validated('description');
        $item->full_description = $request->validated('full_description');
        $item->country = $request->validated('country');
        $item->preview = $request->validated('preview');
        $item->meta_title = $request->validated('meta_title');
        $item->meta_description = $request->validated('meta_description');
        $item->unit = $request->validated('unit');
        echo $item->save();

    }

    public function deleteItem($id): void
    {
        Item::find($id)->delete();
    }

    public function addNewItem(ItemRequest $request): void
    {
        $art = $request->validated('art') ?: '';
        $name = $request->validated('name');
        $price = $request->validated('price');
        $price_usd = $request->validated('price_usd');
        $price_eur = $request->validated('price_eur');
        $description = $request->validated('description');
        $full_description = $request->validated('full_description');
        $country = $request->validated('country');
        $preview = $request->validated('preview');
        $priority = $request->validated('priority');
        $meta_title = $request->validated('meta_title');
        $meta_description = $request->validated('meta_description');
        $category = $this->getCategoryIdByUrl($request->validated('category'));
        $majorId = $request->validated('majorId') ?: false;
        $item = new Item;
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
        $item->unit = $request->validated('unit');
        if ($majorId && $majorId != 0) {
            $item->main_item = 0;
            $item->parent_id = $majorId;
        } else {
            $item->main_item = 1;
            $item->parent_id = 0;
        }
        $item->preview = $preview;
        $item->meta_title = $meta_title;
        $item->meta_description = $meta_description;
        echo $item->save();
    }

    public function test(): void
    {
        $items = Item::all();
        foreach ($items as $item) {
            echo $item->name.'<br>';
        }
    }

    public function loadAllItems()
    {
        return Item::select('name', 'category', 'priority', 'art', 'price', 'price_usd', 'price_eur', 'description', 'country')->get();
    }
}
