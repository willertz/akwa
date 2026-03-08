<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request) {
     $path = 'https://akwagarant.ru/'. $request->file('file')->store('uploads','public_uploads');
     return json_encode(['location' => $path]);
    }
}
