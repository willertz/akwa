<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Services\CategoryService;
use App\UseCases\Item\SaveItemAction;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService,
        private readonly SaveItemAction $saveItemAction
    ) {}

    public function getItemsByCatId($catId): bool|object
    {
        $items = Item::where('category', '=', $catId)->orderBy('priority', 'asc')->get();
        if (! $items) {
            return false;
        }

        return $items;
    }

    public function getItemById($id): JsonResponse
    {
        $item = Item::find($id);

        if (! $item) {
            return response()->json(['error' => 'Item not found'], 404);
        }
        $item->category_url = $this->categoryService->getCatUrlById((int) $item->category);

        return response()->json($item);
    }

    public function saveItem(ItemRequest $itemRequest): JsonResponse
    {
        $item = $this->saveItemAction->execute($itemRequest->validated());

        return response()->json($item->exists);
    }

    public function deleteItem($id): JsonResponse
    {
        $item = Item::find($id);
        if (! $item) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        return response()->json($item->delete());
    }

    public function addNewItem(ItemRequest $itemRequest): JsonResponse
    {
        $item = $this->saveItemAction->execute($itemRequest->validated());

        return response()->json($item->exists);
    }

    public function test(): void
    {
        $items = Item::all();
        foreach ($items as $item) {
            echo $item->name.'<br>';
        }
    }

    public function loadAllItems(): JsonResponse
    {
        return response()->json(Item::orderBy('category')->orderBy('priority')->get());
    }
}
