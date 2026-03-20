<?php

declare(strict_types=1);

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
        $shopCategoryController = new ShopCategoryController;
        $category = ShopCategory::where('id', '=', $id)->first();
        $url = $shopCategoryController->getUrlByCode($category->parent_id, $category->slug);

        return url($url);
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
        $sections = explode('/', (string) $url);
        unset($sections[0]);
        unset($sections[1]);
        unset($sections[2]);
        unset($sections[3]);
        $shopCategoryController = new ShopCategoryController;

        return $shopCategoryController->getCategoryByArray($sections)->id;
    }

    public function saveItem(ItemRequest $itemRequest): void
    {

        $item = Item::find($itemRequest->validated('id'));

        $item->art = $itemRequest->validated('art');
        $item->name = $itemRequest->validated('name');
        $item->price = $itemRequest->validated('price');
        $item->priority = $itemRequest->validated('priority');
        $item->price_usd = $itemRequest->validated('price_usd');
        $item->price_eur = $itemRequest->validated('price_eur');
        $item->category = $this->getCategoryIdByUrl($itemRequest->validated('cat_url'));

        if ($itemRequest->validated('parent_id') && $itemRequest->validated('parent_id') != 0) {
            $item->main_item = 0;
            $item->parent_id = $itemRequest->validated('parent_id');
        } else {
            $item->main_item = 1;
            $item->parent_id = 0;
        }

        $item->description = $itemRequest->validated('description');
        $item->full_description = $itemRequest->validated('full_description');
        $item->country = $itemRequest->validated('country');
        $item->preview = $itemRequest->validated('preview');
        $item->meta_title = $itemRequest->validated('meta_title');
        $item->meta_description = $itemRequest->validated('meta_description');
        $item->unit = $itemRequest->validated('unit');
        echo $item->save();

    }

    public function deleteItem($id): void
    {
        Item::find($id)->delete();
    }

    public function addNewItem(ItemRequest $itemRequest): void
    {
        $art = $itemRequest->validated('art') ?: '';
        $name = $itemRequest->validated('name');
        $price = $itemRequest->validated('price');
        $price_usd = $itemRequest->validated('price_usd');
        $price_eur = $itemRequest->validated('price_eur');
        $description = $itemRequest->validated('description');
        $full_description = $itemRequest->validated('full_description');
        $country = $itemRequest->validated('country');
        $preview = $itemRequest->validated('preview');
        $priority = $itemRequest->validated('priority');
        $meta_title = $itemRequest->validated('meta_title');
        $meta_description = $itemRequest->validated('meta_description');
        $category = $this->getCategoryIdByUrl($itemRequest->validated('category'));
        $majorId = $itemRequest->validated('majorId') ?: false;
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
        $item->unit = $itemRequest->validated('unit');
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
