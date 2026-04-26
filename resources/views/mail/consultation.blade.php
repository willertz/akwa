<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заявка на консультацию</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; padding: 30px; }
        h2 { color: #1a73e8; border-bottom: 2px solid #1a73e8; padding-bottom: 10px; }
        .field { margin-bottom: 12px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 4px; }
        .footer { margin-top: 24px; font-size: 12px; color: #999; border-top: 1px solid #eee; padding-top: 12px; }
    </style>
</head>
<body>
<div class="container">
    <h2>💬 Новая заявка на консультацию — Аквагарант</h2>

    <div class="field">
        <div class="label">Имя:</div>
        <div class="value">{{ $data['name'] }}</div>
    </div>
    <div class="field">
        <div class="label">Телефон:</div>
        <div class="value">{{ $data['phone'] }}</div>
    </div>
    @if(!empty($data['email']))
    <div class="field">
        <div class="label">E-mail:</div>
        <div class="value">{{ $data['email'] }}</div>
    </div>
    @endif
    @if(!empty($data['method']))
    <div class="field">
        <div class="label">Способ связи:</div>
        <div class="value">{{ $data['method'] }}</div>
    </div>
    @endif

    <div class="footer">
        Письмо отправлено автоматически с сайта {{ config('app.url') }}
    </div>
</div>
</body>
</html>
