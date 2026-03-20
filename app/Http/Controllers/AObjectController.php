<?php

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
        return AObject::where(static function ($query) {
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

    public function updateObj(AObjectRequest $request, $hash): void
    {
        $object = AObject::find($request->validated('id'));
        $object->name = $request->validated('name') ?? '';
        $object->title = $request->validated('title') ?? '';
        $object->preview_pict = $request->validated('preview_pict') ?? '';
        $object->description = $request->validated('description') ?? '';
        $object->slider_hash = $hash ?? '';
        $object->content = $request->validated('content') ?? '';
        $object->save();
    }

    public function addNewObject(AObjectRequest $request, $hash): void
    {

        $object = new AObject;
        $object->name = $request->validated('name');
        $object->title = '';
        $object->preview_pict = $request->validated('preview_pict');
        $object->description = '';
        $object->slider_hash = $hash;
        $object->content = $request->validated('content');

        $object->save();

    }
}
