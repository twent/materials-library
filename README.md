## Тестовое задание "Библиотека Материалов"

Использовалось в разработке:

- Docker-compose
- PHP-7.4.30 FPM
- PostgreSQL 14
- Laravel 8
- Пакеты (laravel/ui (Bootstrap), myclabs/php-enum, barryvdh/laravel-debugbar)

## Как развернуть

1) Клонировать данный репозиторий
2) Настроить `.env` файл под себя
3) `composer install`
4) `yarn install`
5) `yarn run prod`
6) `sail up` или `docker-compose up`
7) Внутри Докера выполнить `php artisan migrate --seed`
8) Открыть приложение в браузере `http://localhost`
9) Зарегистрироваться и пользоваться

Автор: [twent](https://github.com/twent)
