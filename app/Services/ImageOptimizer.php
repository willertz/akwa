<?php

declare(strict_types=1);

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class ImageOptimizer
{
    private ImageManager $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    /**
     * Транслитерация русского текста в латиницу
     */
    public function transliterate(string $text): string
    {
        $map = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',
            'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I',
            'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
            'У' => 'U', 'Ф' => 'F', 'Х' => 'Kh', 'Ц' => 'Ts', 'Ч' => 'Ch',
            'Ш' => 'Sh', 'Щ' => 'Sch', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        ];

        return strtr($text, $map);
    }

    /**
     * Нормализация имени файла: транслитерация, строчные буквы, замена спецсимволов на дефис
     */
    public function normalizeName(string $originalName): string
    {
        $name = pathinfo($originalName, PATHINFO_FILENAME);
        $name = $this->transliterate($name);
        $name = mb_strtolower($name);
        // Заменяем всё кроме букв, цифр и дефисов на дефис
        $name = preg_replace('/[^a-z0-9]+/', '-', $name);
        $name = trim($name, '-');
        $name = $name ?: 'image';

        return $name;
    }

    /**
     * Конвертирует изображение в WebP с качеством 85% и сохраняет в папку год/месяц.
     * Также создаёт миниатюру.
     *
     * @return array{filename: string, path: string, url: string, thumbnail_url: string, width: int, height: int, size: int}
     */
    public function process(\Illuminate\Http\UploadedFile $file, string $altText = ''): array
    {
        $year = date('Y');
        $month = date('m');
        $subDir = "media/{$year}/{$month}";
        $basePath = public_path($subDir);

        if (!is_dir($basePath) && !mkdir($basePath, 0775, true) && !is_dir($basePath)) {
            throw new \RuntimeException("Failed to create directory: {$basePath}");
        }

        $thumbDir = $basePath . '/thumbs';
        if (!is_dir($thumbDir) && !mkdir($thumbDir, 0775, true) && !is_dir($thumbDir)) {
            throw new \RuntimeException("Failed to create directory: {$thumbDir}");
        }

        $normalizedName = $this->normalizeName($file->getClientOriginalName());
        $uniqueSuffix = substr(md5(uniqid('', true)), 0, 8);
        $filename = "{$normalizedName}-{$uniqueSuffix}.webp";
        $thumbFilename = "{$normalizedName}-{$uniqueSuffix}-thumb.webp";

        $fullPath = $basePath . '/' . $filename;
        $thumbPath = $thumbDir . '/' . $thumbFilename;

        // Читаем и обрабатываем изображение
        $image = $this->manager->decode($file->getRealPath());
        $width = $image->width();
        $height = $image->height();

        // Сохраняем основное изображение в WebP с качеством 85%
        $image->encode(new WebpEncoder(85))->save($fullPath);
        // Создаём миниатюру 300x300 (crop)
        $thumb = $this->manager->decode($file->getRealPath());
        $thumb->cover(300, 300);
        $thumb->encode(new WebpEncoder(85))->save($thumbPath);

        $size = filesize($fullPath);
        $urlBase = url($subDir);

        return [
            'filename'      => $filename,
            'path'          => $subDir . '/' . $filename,
            'url'           => $urlBase . '/' . $filename,
            'thumbnail_url' => $urlBase . '/thumbs/' . $thumbFilename,
            'width'         => $width,
            'height'        => $height,
            'size'          => (int) $size,
        ];
    }
}
