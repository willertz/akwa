<?php

namespace App\Http\Controllers;

use App\Models\Slider;

class SliderController extends Controller
{
    public function getSliderByHash($hash): array
    {
        $res = null;
        $slider = Slider::where('slider_hash', $hash)->get();
        foreach ($slider as $slide) {
            $res[] = $slide->url;

        }

        return $res;
    }

    public function addSliderByHash($slider, $hash): void
    {
        foreach ($slider as $slide) {
            $slider = new Slider;
            $slider->slider_hash = $hash;
            $slider->url = $slide;
            $slider->save();
        }
    }
}
