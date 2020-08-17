# Файлы

.env - aфайл локальных настроек

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