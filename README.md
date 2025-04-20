Steam Knives Shop

Мини-интернет-магазин ножей для платформы Steam. Реализовано на Laravel 10.

Функционал

- Регистрация и авторизация пользователей
- Просмотр каталога ножей
- Добавление товаров в корзину
- Удаление товаров из корзины и автоматический подсчет денег в корзине

  Используемые технологии

- Laravel 10
- Laravel Breeze
- Tailwind CSS
- MySQL
- Livewire 

Запуск проекта

```bash
git clone https://github.com/Aisuluwka/steam-knives-.git
cd steam-knives-
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

сложности
-проблема с авторизацией
-добавление товаров в корзину
-настройка пакетов и их интеграция с Laravel

возможные улучшения 
-улучшение интерфейса
-оформление заказа
-добавить поиск и фильтр по ценам



I spent approximately 8 hours in general to get this task done. 
