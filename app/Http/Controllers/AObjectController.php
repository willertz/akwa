<?php

namespace App\Http\Controllers;

use App\AObject;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;

class AObjectController extends Controller
{
    public function getAllObjects($limit=false) {
        return AObject::orderBy('id','desc')->get();
    }

    public function getObject($id) {
        $object = AObject::find($id);
        if ($object) {
            return $object;
        } else {
            abort(404);
        }
    }

public function get4Object() {
    return AObject::where(function($query) {
        // Основной запрос для получения 4 последних записей
        $query->whereNotIn('id', [100, 98])
              ->orderBy('id', 'desc')
              ->limit(4);
    })
    ->orWhereIn('id', [91, 89]) // Добавляем замены
    ->orderByRaw("
        CASE 
            WHEN id IN (91, 89) THEN 0 
            ELSE 1 
        END,
        id DESC
    ")
    ->limit(4)
    ->get();
}

    public function deleteObj($id) {
        return AObject::where('id','=',$id)->delete();
    }

    public function updateObj($request,$hash) {
        $object = AObject::find($request->id);
        $object->name = $request->name ?? "";
        $object->title = $request->title ?? "";
        $object->preview_pict = $request->preview_pict ?? "";
        $object->description = $request->description ?? "";
        $object->slider_hash = $hash ?? "";
        $object->content = $request->content ?? "";
        $object->save();
    }

    public function addNewObject(Request $request,$hash) {
        
        $object = new AObject();
        $object->name = $request->name;
        $object->title = "";
        $object->preview_pict = $request->preview_pict;
        $object->description = "";
        $object->slider_hash = $hash;
        $object->content = $request->content;
       
        $object->save();
        
    }
}
