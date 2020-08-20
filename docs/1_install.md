# Файлы

.env - aфайл локальных настроек

# Функции

dd($var) - Дамп переменной

# Плагины

- https://github.com/barryvdh/laravel-ide-helper
- https://github.com/barryvdh/laravel-debugbar

# Создаём БД

```
CREATE SCHEMA `poligon` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

# Создаём модели и миграции

```
php artisan make:model Models/BlogCategory -m
php artisan make:model Models/BlogPost -m
```

# Создаём сиды

```
php artisan make:seeder UsersTableSeeder
php artisan make:seeder BlogCategoriesTableSeeder
```

## Запуск сидов

```
php artisan db:seed
php artisan db:seed --class=UsersTableSeeder
php artisan migrate:refresh --seed
```

# Создаём фабрики

```
php artisan make:factory BlogPostFactory
```


# Контроллеры

## Создание REST контроллера

```
php artisan make:controller RestTestController --resource
```

## Контроллеры приложений

Базовый (родительский) контроллер блога

```
php artisan make:controller Blog/BaseController
```

Контроллер статей блога

```
php artisan make:controller Blog/PostController --resource
```

Для каждого модуля делаем базовый абстрактный контроллер, от которого будут наследоваться остальные контроллеры модуля.

# Подключение SoftDeletes в модели

```
use SoftDeletes;
```

# Аутентификация

## Создание базовых фвйлов и настроек

```
composer require laravel/ui
composer update
php artisan ui vue --auth
npm install && npm run dev
```

## Запуск миграции

```
php artisan migrate
```

Тестирование

```
http://poligon.local/register
```

