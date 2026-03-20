<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AObjectRequest;
use App\Models\AObject;

class AObjectController extends Controller
{
    public function getAllObjects()
    {
        return AObject::orderBy('id', 'desc')->get();
    }

    public function getObject($id)
    {
        $object = AObject::find($id);
        if ($object) {
            return $object;
        }

        abort(404);
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

    public function deleteObj($id)
    {
        return AObject::where('id', '=', $id)->delete();
    }

    public function updateObj(AObjectRequest $aObjectRequest, $hash): void
    {
        $object = AObject::find($aObjectRequest->validated('id'));
        $object->name = $aObjectRequest->validated('name') ?? '';
        $object->title = $aObjectRequest->validated('title') ?? '';
        $object->preview_pict = $aObjectRequest->validated('preview_pict') ?? '';
        $object->description = $aObjectRequest->validated('description') ?? '';
        $object->slider_hash = $hash ?? '';
        $object->content = $aObjectRequest->validated('content') ?? '';
        $object->save();
    }

    public function addNewObject(AObjectRequest $aObjectRequest, $hash): void
    {

        $aObject = new AObject;
        $aObject->name = $aObjectRequest->validated('name');
        $aObject->title = $aObjectRequest->validated('title') ?? '';
        $aObject->preview_pict = $aObjectRequest->validated('preview_pict') ?? '';
        $aObject->description = $aObjectRequest->validated('description') ?? '';
        $aObject->slider_hash = $hash;
        $aObject->content = $aObjectRequest->validated('content');

        $aObject->save();
        echo 'success';

    }
}
