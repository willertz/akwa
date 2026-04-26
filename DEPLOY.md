# Рекомендации по деплою проекта AKWA

Данный документ содержит важные инструкции и рекомендации для развертывания проекта на сервере.

## Требования к окружению
- **PHP 8.3 или выше**. Проект был адаптирован для совместимости с PHP 8.3 (исправлены типизации, именование Scope в моделях и импорты).
- **MySQL 5.7+ / MariaDB 10.3+**
- **Composer 2.x**
- **Node.js & NPM** (для сборки фронтенда, если используется Vite/Mix)

## Настройка окружения (.env)
При развертывании убедитесь, что в файле `.env` настроены следующие параметры:

### 1. Яндекс.Метрика
Для корректной работы аналитики добавлена настройка:
```env
YANDEX_METRIKA_ID=ваш_id_счетчика
```
**Важно:** Скрипты метрики автоматически **отключаются**, если `APP_ENV=local`. Для работы на продакшене убедитесь, что `APP_ENV=production`.

### 2. Видео на главной странице

Видео необходимо разместить в папке /public/video/:

/public/video/glulam_house_heating_installation_in_Voronezh.mp4
/public/video/house_is_made_of_gluedbeams.mp4
/public/video/obzor_doma.mp4
/public/video/obzor_doma_1.mp4
/public/video/overview_of_the_building_with_a_swimming_pool.mp4
/public/video/very_cool_engineering_plumbing_in_the_house.mp4

### 3. Сортировка товаров
Реализована серверная сортировка товаров в магазине. Поддерживаются параметры:
- `sort=price_asc` (Сначала дешевые)
- `sort=price_desc` (Сначала дорогие)
- `sort=newest` (Сначала новинки)
Логика реализована в `PageController` и `Item::getGroupedByCategory`. Клиентская часть в `resources/js/site.js` (требуется сборка через `npm run build` при изменениях).

## Шаги развертывания

1. **Клонирование репозитория и установка зависимостей:**
   ```bash
   composer install --no-dev --optimize-autoloader
   npm install
   npm run build # или npm run prod
   ```

2. **Настройка прав доступа:**
   Убедитесь, что папки `storage` и `bootstrap/cache` доступны для записи пользователю веб-сервера.

3. **Миграции:**
   ```bash
   php artisan migrate --force
   ```

4. **Кэширование конфигурации для продакшена:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Настройка отправки почты через Яндекс SMTP

Сайт использует Яндекс SMTP для отправки писем менеджеру при оформлении заказов и заявок с форм.

### 1. Создание пароля приложения в Mail

1. Войдите в аккаунт Mail, с которого будет отправляться почта и нажмите на значок **шестерёнки** (⚙️) в левом нижнем углу интерфейса.
2. В выпадающем меню выберите пункт **«Все настройки»**.
3. Перейдите на вкладку **«Безопасность»**.
4. Прокрутите страницу вниз до блока **«Пароли для внешних приложений»** и нажмите кнопку **«Создать»**. <br> *Если блок отсутствует, убедитесь, что к вашему аккаунту привязан номер телефона — это обязательное условие.*
5. Придумайте **название** для пароля (например, `МойСайт` или `Laravel App`). Это поможет вам идентифицировать, для какого приложения создан пароль.
6. Выберите **уровень доступа**: • «Только отправка писем в Почте» — только SMTP. • «Полный доступ к Почте» — SMTP + IMAP/POP3.
7. Нажмите **«Продолжить»**. Система сгенерирует случайный пароль.
8. **❗ Важно:** скопируйте сгенерированный пароль и сохраните его в надёжном месте. Он показывается **только один раз**, восстановить его невозможно.
9. 

### 1.2 iframe карты

Необходимо заменить iframe карты на корректный:

<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A50586e7cba09cfae1a9b567d1b4a82886fc17a59ff70c5d3e8229adfe0c001b5&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>

> ⚠️ Обычный пароль от аккаунта не подходит — нужен именно пароль приложения.

### 2. Настройка `.env`

Заполните следующие переменные в файле `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mail.ru
MAIL_PORT=465
MAIL_USERNAME=your_email@mail.ru
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=your_email@yandex.ru
MAIL_FROM_NAME="${APP_NAME}"

# Email менеджера для получения заявок
MANAGER_EMAIL=manager@mail.ru
```

- `MAIL_USERNAME` и `MAIL_FROM_ADDRESS` — адрес Mail-почты, с которой отправляются письма.
- `MAIL_PASSWORD` — пароль приложения.
- `MANAGER_EMAIL` — адрес менеджера, на который приходят все заявки.

### 3. Проверка отправки

После настройки `.env` выполните:

```bash
php artisan config:clear
php artisan tinker --execute="Mail::to(env('MANAGER_EMAIL'))->send(new \App\Mail\ConsultationMail(['name'=>'Тест','phone'=>'+7900','email'=>'']))"
```

Если письмо пришло — настройка выполнена корректно.

### 4. Типы писем и формы

| Форма | Маршрут | Mailable | Шаблон |
|---|---|---|---|
| Оформление заказа (корзина) | `POST /api/send-cart` | `OrderMail` | `mail/order.blade.php` |
| Запишитесь на встречу | `POST /api/send-meeting` | `MeetingMail` | `mail/meeting.blade.php` |
| Получить консультацию | `POST /api/send-mail` | `ConsultationMail` | `mail/consultation.blade.php` |

### 5. Кэширование конфигурации

После изменения `.env` на продакшене обязательно выполните:

```bash
php artisan config:cache
```

---

## Исправления и доработки (Апрель 2026)
- **PHP 8.3 Compatibility:** Исправлен `RegisterController` (импорт Request), модель `AObject` (переименован `scopeGetLatest4`), и `Handler.php` (типизация `$dontReport`).
- **Yandex Metrika:** Переведена на конфигурационный файл `config/services.php` и управляется через `.env`.
- **Bugfix:** Исправлена ошибка `InvalidArgumentException` связанная с отсутствием путей для `ckfinder`.
