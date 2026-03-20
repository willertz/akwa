<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class NoticeController extends Controller
{
    public function getNotice()
    {
        $notice = null;
        $notice[] = [
            'text' => 'После устранения бага с неправильным выводом товаров в категориях, теперь при добавлении товара необходимо вводить URL полностью.
                    Например: /catalog/napolnye-kotly-otopleniya/protherm-2/prinadlezhnosti-k-napolnym-kotlam/komnatnye_termoregulyatory',
        ];
        $notice[] = [
            'text' => 'Добавлена возможность управлять порядком вывода товаров. При создании или редактировании товара, появилось поле Сортировка.
                        Чем выше это число, тем выше товар будет в списке',
        ];

        return json_encode($notice);
    }
}
