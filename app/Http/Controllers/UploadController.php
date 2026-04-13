<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Http\JsonResponse;

class UploadController extends Controller
{
    public function upload(UploadRequest $uploadRequest): JsonResponse
    {
        $file = $uploadRequest->file('upload') ?? $uploadRequest->file('file');
        $path = url('/').'/'.$file->store('uploads', 'public_uploads');

        return response()->json(['url' => $path, 'location' => $path]);
    }
}
