<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Http\JsonResponse;

class UploadController extends Controller
{
    public function upload(UploadRequest $uploadRequest): JsonResponse
    {
        $path = url('/').'/'.$uploadRequest->file('file')->store('uploads', 'public_uploads');

        return response()->json(['location' => $path]);
    }
}
