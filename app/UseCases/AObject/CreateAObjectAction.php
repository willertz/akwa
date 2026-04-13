<?php

declare(strict_types=1);

namespace App\UseCases\AObject;

use App\Models\AObject;
use App\Services\SliderService;
use Illuminate\Support\Facades\DB;

readonly class CreateAObjectAction
{
    public function __construct(private SliderService $sliderService) {}

    public function execute(array $data): AObject
    {
        return DB::transaction(function () use ($data) {
            $hash = md5((string) time());

            if (! empty($data['slider'])) {
                $this->sliderService->syncSliderByHash($data['slider'], $hash);
            }

            return AObject::create([
                'name' => $data['name'],
                'title' => $data['title'] ?? '',
                'preview_pict' => $data['preview_pict'] ?? '',
                'description' => $data['description'] ?? '',
                'slider_hash' => $hash,
                'content' => $data['content'] ?? '',
                'floors' => $data['floors'] ?? null,
                'price_per_sqm' => $data['price_per_sqm'] ?? null,
                'area' => $data['area'] ?? null,
                'detail_description' => $data['detail_description'] ?? null,
                'left_image' => $data['left_image'] ?? null,
                'features' => $data['features'] ?? null,
                'big_description' => $data['big_description'] ?? null,
            ]);
        });
    }
}
