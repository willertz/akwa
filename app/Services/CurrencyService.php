<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CurrencyService
{
    private const string CACHE_FILE = 'currency/daily.json';

    private const string SOURCE_URL = 'https://www.cbr-xml-daily.ru/daily_json.js';

    public function convertToRub(string $currency, float $amount): float
    {
        if ($currency === 'RUB') {
            return $amount;
        }

        $rates = $this->getRates();
        if (! $rates || ! isset($rates->Valute->{$currency})) {
            return $amount;
        }

        return (float) $rates->Valute->{$currency}->Value * $amount;
    }

    private function getRates(): ?object
    {
        if (Storage::exists(self::CACHE_FILE) && Storage::lastModified(self::CACHE_FILE) > time() - 3600) {
            return json_decode((string) Storage::get(self::CACHE_FILE), false);
        }

        try {
            $response = Http::get(self::SOURCE_URL);
            if ($response->successful()) {
                Storage::put(self::CACHE_FILE, $response->body());

                return $response->object();
            }
        } catch (\Exception) {
            // Log error or handle gracefully
        }

        if (Storage::exists(self::CACHE_FILE)) {
            return json_decode((string) Storage::get(self::CACHE_FILE), false);
        }

        return null;
    }
}
