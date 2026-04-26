<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новый заказ</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; padding: 30px; }
        h2 { color: #1a73e8; border-bottom: 2px solid #1a73e8; padding-bottom: 10px; }
        .field { margin-bottom: 12px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th { background: #1a73e8; color: #fff; padding: 8px 12px; text-align: left; }
        td { padding: 8px 12px; border-bottom: 1px solid #eee; }
        tr:last-child td { border-bottom: none; }
        .total { font-weight: bold; font-size: 16px; margin-top: 16px; text-align: right; }
        .footer { margin-top: 24px; font-size: 12px; color: #999; border-top: 1px solid #eee; padding-top: 12px; }
    </style>
</head>
<body>
<div class="container">
    <h2>🛒 Новый заказ на сайте Аквагарант</h2>

    <div class="field">
        <div class="label">ФИО:</div>
        <div class="value">{{ $data['name'] }}</div>
    </div>
    <div class="field">
        <div class="label">Телефон:</div>
        <div class="value">{{ $data['phone'] }}</div>
    </div>
    <div class="field">
        <div class="label">E-mail:</div>
        <div class="value">{{ $data['email'] }}</div>
    </div>
    <div class="field">
        <div class="label">Способ доставки:</div>
        <div class="value">{{ $data['delivery'] }}</div>
    </div>
    @if(!empty($data['city']))
    <div class="field">
        <div class="label">Город:</div>
        <div class="value">{{ $data['city'] }}</div>
    </div>
    @endif
    @if(!empty($data['address']))
    <div class="field">
        <div class="label">Адрес доставки:</div>
        <div class="value">{{ $data['address'] }}</div>
    </div>
    @endif
    @if(!empty($data['note']))
    <div class="field">
        <div class="label">Примечание:</div>
        <div class="value">{{ $data['note'] }}</div>
    </div>
    @endif

    <h3>Состав заказа:</h3>
    <table>
        <thead>
            <tr>
                <th>Товар</th>
                <th>Кол-во</th>
                <th>Цена за ед.</th>
                <th>Сумма</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['items'] as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['count'] }}</td>
                <td>{{ number_format($item['price'], 0, '.', ' ') }} ₽</td>
                <td>{{ number_format($item['price'] * $item['count'], 0, '.', ' ') }} ₽</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">Итого: {{ number_format($data['total'], 0, '.', ' ') }} ₽</div>

    <div class="footer">
        Письмо отправлено автоматически с сайта {{ config('app.url') }}
    </div>
</div>
</body>
</html>
