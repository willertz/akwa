<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AObjectRequest;
use App\Models\AObject;
use App\Services\SliderService;
use App\UseCases\AObject\CreateAObjectAction;
use App\UseCases\AObject\UpdateAObjectAction;
use Illuminate\Http\JsonResponse;

class AObjectController extends Controller
{
    public function __construct(
        private readonly SliderService $sliderService,
        private readonly CreateAObjectAction $createAObjectAction,
        private readonly UpdateAObjectAction $updateAObjectAction
    ) {}

    public function getAllObjects()
    {
        return AObject::orderBy('id', 'desc')->get();
    }

    public function get4Object()
    {
        return AObject::where(static function ($query): void {
            // Основной запрос для получения 4 последних записей
            $query->whereNotIn('id', [100, 98])
                ->orderBy('id', 'desc')
                ->limit(4);
        })
            ->orWhereIn('id', [91, 89]) // Добавляем замены
            ->orderByRaw('
        CASE
            WHEN id IN (91, 89) THEN 0
            ELSE 1
        END,
        id DESC
    ')
            ->limit(4)
            ->get();
    }

    public function deleteObj($id): JsonResponse
    {
        $deleted = AObject::where('id', '=', $id)->delete();

        return response()->json(['success' => (bool) $deleted]);
    }

    public function updateObj(AObjectRequest $aObjectRequest): JsonResponse
    {
        $this->updateAObjectAction->execute(
            (int) $aObjectRequest->validated('id'),
            $aObjectRequest->validated()
        );

        return response()->json(['status' => 'success']);
    }

    public function addNewObject(AObjectRequest $aObjectRequest): JsonResponse
    {
        $this->createAObjectAction->execute($aObjectRequest->validated());

        return response()->json(['status' => 'success']);
    }

    public function loadSingleObj($id): JsonResponse
    {
        $object = $this->getObject($id);
        $slider = $this->sliderService->getSliderUrlsByHash((string) $object->slider_hash);

        return response()->json(['obj' => $object, 'slider' => $slider]);
    }

    public function getObject($id)
    {
        $object = AObject::find($id);
        if ($object) {
            return $object;
        }

        abort(404);
    }
}
