<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class PriceController extends Controller
{
    public function getPrice($currency, $price): float
    {
        $course = $this->getCourse();
        $price = (float) ($price);

        switch ($currency) {
            case 'USD':
                $res = $course->Valute->USD->Value * $price;
                break;
            case 'EUR':
                $res = $course->Valute->EUR->Value * $price;
                break;
            default:
                return $price;

        }

        return $res;
    }

    protected function getCourse(): mixed
    {
        $json_daily_file = __DIR__.'/cache/daily.json';
        if ((! is_file($json_daily_file) || filemtime($json_daily_file) < time() - 3600) && $json_daily = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js')) {
            file_put_contents($json_daily_file, $json_daily);
        }

        return json_decode(file_get_contents($json_daily_file), false);
    }
}
