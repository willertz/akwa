<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Media;
use App\Services\ImageOptimizer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __construct(private readonly ImageOptimizer $optimizer)
    {
    }

    /**
     * Список медиафайлов (с фильтром по папке)
     */
    public function index(Request $request): JsonResponse
    {
        $folder = $request->query('folder');
        $query = Media::orderBy('created_at', 'desc');

        if ($folder !== null) {
            $query->where('folder', $folder ?: null);
        }

        return response()->json($query->get());
    }

    /**
     * Загрузка и оптимизация изображения
     */
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|image|max:20480',
            'alt'  => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        $alt = $request->input('alt', '');
        $folder = $request->input('folder');

        $processed = $this->optimizer->process($file, $alt);

        $media = Media::create([
            'original_name' => $file->getClientOriginalName(),
            'filename'      => $processed['filename'],
            'path'          => $processed['path'],
            'url'           => $processed['url'],
            'thumbnail_url' => $processed['thumbnail_url'],
            'mime_type'     => 'image/webp',
            'size'          => $processed['size'],
            'width'         => $processed['width'],
            'height'        => $processed['height'],
            'alt'           => $alt,
            'folder'        => $folder ?: null,
        ]);

        return response()->json($media, 201);
    }

    /**
     * Обновление alt-текста медиафайла
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $media = Media::findOrFail($id);
        $media->update($request->only(['alt', 'folder']));

        return response()->json($media);
    }

    /**
     * Удаление медиафайла
     */
    public function destroy(int $id): JsonResponse
    {
        $media = Media::findOrFail($id);

        // Удаляем физические файлы
        $fullPath = public_path($media->path);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        // Удаляем миниатюру
        if ($media->thumbnail_url) {
            $thumbRelPath = str_replace(url('/'), '', $media->thumbnail_url);
            $thumbFullPath = public_path(ltrim($thumbRelPath, '/'));
            if (file_exists($thumbFullPath)) {
                unlink($thumbFullPath);
            }
        }

        $media->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Список папок (уникальные значения поля folder)
     */
    public function folders(): JsonResponse
    {
        $folders = Media::whereNotNull('folder')
            ->distinct()
            ->pluck('folder')
            ->values();

        return response()->json($folders);
    }
}
