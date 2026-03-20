<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Slider;

class SliderService
{
    /**
     * @return string[]
     */
    public function getSliderUrlsByHash(string $hash): array
    {
        return Slider::where('slider_hash', $hash)
            ->pluck('url')
            ->toArray();
    }

    public function syncSliderByHash(array $urls, string $hash): void
    {
        // Delete existing slides for this hash
        Slider::where('slider_hash', $hash)->delete();

        foreach ($urls as $url) {
            Slider::create([
                'slider_hash' => $hash,
                'url' => $url,
            ]);
        }
    }
}
