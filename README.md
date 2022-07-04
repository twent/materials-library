## Тестовое задание "Библиотека Материалов"

Использовалось в разработке:

- Docker-compose
- PHP-7.4.30 FPM + XDebug (c ключом для IDE)
- PostgreSQL 14
- Laravel 8
- Пакеты (laravel/ui (Bootstrap), myclabs/php-enum, barryvdh/laravel-debugbar, nunomaduro/larastan, barryvdh/laravel-ide-helper)

## Как развернуть

1) Клонировать данный репозиторий
2) Выбрать `.env.development.example`или `.env.production.example` за основу
3) `php artisan key:generate`
4) `composer install --optimize-autoloader`
5) `yarn install`
6) `yarn run prod`
7) `./vendor/bin/sail up` или `docker-compose up`
8) Внутри Докера выполнить `php artisan migrate --seed`
9) Открыть приложение в браузере `http://localhost`, если всё в порядке, то идём дальше.
10) `php artisan config:cache`
11) `php artisan route:cache`
12) `php artisan view:cache`
13) Зарегистрироваться и пользоваться

Автор: [twent](https://github.com/twent)
