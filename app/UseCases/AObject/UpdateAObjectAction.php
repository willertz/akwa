<?php

declare(strict_types=1);

namespace App\UseCases\AObject;

use App\Models\AObject;
use App\Services\SliderService;
use Illuminate\Support\Facades\DB;

readonly class UpdateAObjectAction
{
    public function __construct(private SliderService $sliderService) {}

    public function execute(int $id, array $data): AObject
    {
        return DB::transaction(function () use ($id, $data) {
            $object = AObject::findOrFail($id);

            $hash = $object->slider_hash ?: md5((string) time());

            if (isset($data['slider'])) {
                $this->sliderService->syncSliderByHash($data['slider'], $hash);
            }

            $object->update([
                'name' => $data['name'],
                'title' => $data['title'] ?? '',
                'preview_pict' => $data['preview_pict'] ?? '',
                'description' => $data['description'] ?? '',
                'slider_hash' => $hash,
                'content' => $data['content'] ?? '',
            ]);

            return $object;
        });
    }
}
