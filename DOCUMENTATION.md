# Документация проекта AKWAGARANT

## Описание проекта

**AKWAGARANT** — веб-приложение на базе фреймворка **Laravel 13**, реализующее корпоративный сайт с интернет-магазином, блогом, каталогом объектов и административной панелью.

### Основные разделы сайта

| Маршрут | Описание |
|---|---|
| `/` | Главная страница |
| `/objects` | Список объектов |
| `/blog` | Блог / статьи |
| `/price` | Прайс-лист |
| `/contacts` | Контакты |
| `/internet-magazin` | Интернет-магазин |
| `/catalog/*` | Каталог товаров |
| `/cart` | Корзина |
| `/video` | Видео |
| `/home` | **Административная панель (SPA)** |

### Технологический стек

- **Backend:** PHP, Laravel 13
- **Frontend:** Vue.js (SPA в административной части)
- **База данных:** SQLite (для локальной разработки)
- **Сборка фронтенда:** Vite

---

## База данных

### SQLite для локальной разработки

Да, **SQLite можно и нужно использовать** для локальной разработки данного проекта. SQLite уже настроен как база данных по умолчанию.

В файле `.env` уже прописано:

```env
DB_CONNECTION=sqlite
```

Файл базы данных `database/database.sqlite` уже присутствует в проекте. Никаких дополнительных настроек не требуется.

---

## Установка и запуск проекта

### 1. Клонирование и установка зависимостей

```bash
# Установить PHP-зависимости
composer install

# Установить JS-зависимости
npm install
```

### 2. Настройка окружения

```bash
# Скопировать файл окружения (если .env ещё не существует)
cp .env.example .env

# Сгенерировать ключ приложения
php artisan key:generate
```

### 3. Создание и миграция базы данных

```bash
# Создать файл SQLite базы данных (если не существует)
touch database/database.sqlite

# Выполнить миграции
php artisan migrate
```

### 4. Сборка фронтенда

```bash
# Для разработки (с hot-reload)
npm run dev

# Для продакшена
npm run build
```

### 5. Запуск локального сервера

```bash
php artisan serve
```

Приложение будет доступно по адресу: **http://localhost:8000**

---

## Создание администратора

Административная панель доступна авторизованным пользователям. Для создания администратора используйте один из следующих способов:

### Способ 1: через Artisan Tinker (рекомендуется)

```bash
php artisan tinker
```

В интерактивной консоли выполните:

```php
use App\Models\User;

User::create([
    'name'     => 'Admin',
    'email'    => 'admin@example.com',
    'password' => bcrypt('your_password'),
]);
```

Для выхода из Tinker нажмите `Ctrl+D` или введите `exit`.

### Способ 2: через стандартную регистрацию

1. Перейдите по адресу: **http://localhost:8000/register**
2. Заполните форму регистрации (имя, email, пароль)
3. После регистрации пользователь автоматически получает доступ к административной панели

### Способ 3: через Seeder

Создайте seeder для удобного воспроизведения:

```bash
php artisan make:seeder AdminUserSeeder
```

Отредактируйте файл `database/seeders/AdminUserSeeder.php`:

```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin',
                'password' => bcrypt('your_password'),
            ]
        );
    }
}
```

Запустите seeder:

```bash
php artisan db:seed --class=AdminUserSeeder
```

---

## Вход в административную панель

### Шаг 1: Авторизация

1. Перейдите по адресу: **http://localhost:8000/login**
2. Введите **email** и **пароль** администратора
3. Нажмите кнопку входа

### Шаг 2: Переход в админку

После успешной авторизации перейдите по адресу:

**http://localhost:8000/home**

Административная панель представляет собой Vue.js SPA и позволяет управлять:

- 📦 **Товарами** — добавление, редактирование, удаление товаров (`/api/items`)
- 🗂️ **Категориями** — управление категориями каталога (`/api/categories`)
- 📝 **Статьями** — управление блогом (`/api/articles`)
- 🏗️ **Объектами** — управление объектами компании (`/api/objects`)
- 🖼️ **Слайдером** — загрузка изображений (`/upload-image`)

### Выход из системы

Для выхода выполните POST-запрос на `/logout` (кнопка выхода в интерфейсе).

---

## Структура проекта

```
akwa/
├── app/
│   ├── Http/Controllers/     # Контроллеры
│   │   ├── Auth/             # Аутентификация
│   │   ├── ApiController.php # Отправка почты
│   │   ├── ArticleController.php
│   │   ├── AObjectController.php
│   │   ├── CartController.php
│   │   ├── HomeController.php  # Контроллер админки
│   │   ├── ItemController.php
│   │   ├── PageController.php  # Публичные страницы
│   │   └── ShopCategoryController.php
│   └── Models/               # Модели Eloquent
│       ├── User.php
│       ├── Article.php
│       ├── AObject.php
│       ├── Item.php
│       ├── ShopCategory.php
│       └── Slider.php
├── AKWAGARANT/               # Фронтенд-ресурсы (CSS, JS)
├── database/
│   ├── database.sqlite       # SQLite база данных
│   ├── migrations/           # Миграции
│   └── seeders/              # Сидеры
├── resources/                # Шаблоны Blade, Vue-компоненты
├── routes/
│   └── web.php               # Маршруты приложения
└── .env                      # Конфигурация окружения
```

---

## Переменные окружения (.env)

Ключевые параметры конфигурации:

```env
APP_NAME=Akwagarant
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# База данных (SQLite для локальной разработки)
DB_CONNECTION=sqlite

# Почта (логирование для разработки)
MAIL_DRIVER=log
```

---

## Полезные Artisan-команды

```bash
# Просмотр всех маршрутов
php artisan route:list

# Сброс и повторный запуск всех миграций
php artisan migrate:fresh

# Сброс миграций с запуском сидеров
php artisan migrate:fresh --seed

# Очистка кэша
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```
