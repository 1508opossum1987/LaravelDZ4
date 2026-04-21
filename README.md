# 🔥 Marketplace — Упрощённая версия

Простой, но функциональный маркетплейс на **Laravel 11** с возможностью дальнейшей прокачки.

---

## ✨ Возможности

### Основной функционал
- **Продавцы** (Sellers) — регистрация, профиль, управление товарами
- **Товары** (Products) — добавление, редактирование, фото, категории, цены
- **Заказы** (Orders) — оформление, просмотр истории
- **Корзина** (Cart) — добавление товаров, изменение количества, удаление
- **Статусы заказов** — Pending, Confirmed, Processing, Shipped, Delivered, Cancelled

### Прокачка (реализовано)
- Сложные связи между моделями (много-ко-многим, полиморфные и т.д.)
- Продвинутая бизнес-логика
- Чистая архитектура + Service Layer
- Политики доступа (Policies)
- Валидация и Form Requests
- События и слушатели (Events + Listeners)
- Уведомления (Notifications)

---

## 🛠 Технологии

- **PHP 8.3+**
- **Laravel 11**
- **MySQL / MariaDB**
- **Laravel Sanctum** (API) + Blade (Frontend)
- **Tailwind CSS** + **Alpine.js** (опционально)
- **Laravel Pint** + **PHPStan** (code quality)

---

## 📁 Структура проекта

```bash
app/
├── Models/
│   ├── User.php
│   ├── Seller.php
│   ├── Product.php
│   ├── Order.php
│   ├── OrderItem.php
│   ├── Cart.php
│   └── Category.php
├── Services/
│   ├── CartService.php
│   ├── OrderService.php
│   └── ProductService.php
├── Policies/
├── Events/
├── Listeners/
└── Http/
    ├── Controllers/
    ├── Requests/
    └── Resources/

🚀 Установка
Bash# 1. Клонирование проекта
git clone https://github.com/yourusername/marketplace-laravel.git
cd marketplace-laravel

# 2. Установка зависимостей
composer install

# 3. Настройка окружения
cp .env.example .env

# 4. Генерация ключа
php artisan key:generate

# 5. Настройка базы данных в .env
DB_DATABASE=marketplace
DB_USERNAME=root
DB_PASSWORD=

# 6. Миграции + сиды
php artisan migrate --seed

# 7. Запуск
php artisan serve

👤 Роли и пользователи
РольВозможностиBuyerПросмотр товаров, корзина, оформление заказовSellerУправление своими товарами и заказамиAdminПолный контроль (в будущем)
При сидировании создаётся 3 тестовых продавца и несколько товаров.

📦 Основные маршруты (примеры)
Публичные

GET / — Главная страница
GET /products — Каталог товаров
GET /products/{product} — Карточка товара

Для покупателей

POST /cart/add — Добавить в корзину
GET /cart — Просмотр корзины
POST /checkout — Оформление заказа

Для продавцов

GET /seller/dashboard
GET /seller/products
POST /seller/products
GET /seller/orders


🧠 Бизнес-логика (ключевые моменты)

Один пользователь может быть покупателем и продавцом одновременно
Товар привязан к конкретному продавцу (seller_id)
При оформлении заказа создаётся Order + несколько OrderItem
Статусы заказов обновляются через OrderService
Корзина хранится в отдельной таблице carts (не сессия)
Поддержка нескольких товаров от разных продавцов в одном заказе (разделение по продавцам при необходимости)


🔮 Планы по дальнейшей прокачке

 Платежная система (Stripe / YooKassa / LiqPay)
 Отзывы и рейтинги товаров/продавцов
 Фильтры и поиск по товарам
 Избранное (Wishlist)
 Чат между покупателем и продавцом
 Мультиязычность
 Админ-панель (Filament или Backpack)
 API для мобильного приложения


📄 Лицензия
Этот проект создан в учебно-демонстрационных целях.

Сделано с ❤️ на Laravel
Если тебе нравится проект — поставь звезду ⭐
text---

Хочешь, я сделаю **ещё более красивую версию** с эмодзи, цветными блоками (для GitHub) или добавлю разделы:

- Как запустить тесты
- Диаграмму БД
- Примеры API эндпоинтов
- Contribution Guide

Скажи, в каком стиле хочешь (минималистичный, максимально красивый, корпоративный и т.д.) — подправлю под тебя.1сБыстросделай все в одномВот готовый красивый и полный README.md — всё в одном файле, максимально удобно для твоего проекта:
Markdown# 🔥 Marketplace Laravel

**Упрощённый, но мощный маркетплейс** на **Laravel 11** с чистой архитектурой и продуманной бизнес-логикой.

---

## ✨ Основной функционал

- **Продавцы** — отдельные профили продавцов
- **Товары** — с категориями, ценами, фото и описаниями
- **Корзина** — полноценная, с хранением в БД
- **Заказы** — оформление, история, разделение по продавцам
- **Статусы заказов** — Pending, Confirmed, Processing, Shipped, Delivered, Cancelled

### Прокачанные возможности
- Сложные связи между моделями
- Сервисный слой (`Services`)
- Политики доступа (`Policies`)
- События и слушатели (`Events` + `Listeners`)
- Form Requests для валидации
- Чистая бизнес-логика

---

## 🛠 Технологии

- **PHP 8.3+**
- **Laravel 11**
- **MySQL / MariaDB**
- **Laravel Sanctum** (API аутентификация)
- **Tailwind CSS** + **Alpine.js** (frontend)
- **Laravel Pint** + **PHPStan**

---

## 🚀 Быстрый старт

```bash
# 1. Клонируем проект
git clone https://github.com/yourusername/marketplace-laravel.git
cd marketplace-laravel

# 2. Устанавливаем зависимости
composer install

# 3. Копируем окружение
cp .env.example .env

# 4. Генерируем ключ
php artisan key:generate

# 5. Настраиваем базу данных в файле .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=marketplace_db
DB_USERNAME=root
DB_PASSWORD=

# 6. Запускаем миграции и сиды
php artisan migrate --seed

# 7. Запускаем проект
php artisan serve
Откройте в браузере: http://127.0.0.1:8000

👤 Роли пользователей

Роль Возможности Buyer Просмотр товаров, корзина, оформление заказовSellerУправление товарами, просмотр своих заказовAdminПолный доступ (в разработке)
После сидирования создаётся несколько тестовых продавцов и товаров.

📁 Структура проекта
Bashapp/
├── Models/
│   ├── User.php
│   ├── Seller.php
│   ├── Product.php
│   ├── Category.php
│   ├── Order.php
│   ├── OrderItem.php
│   └── Cart.php
├── Services/
│   ├── CartService.php
│   ├── OrderService.php
│   └── ProductService.php
├── Policies/
├── Events/
├── Listeners/
├── Http/
│   ├── Controllers/
│   ├── Requests/
│   └── Resources/
└── Providers/

📦 Ключевые маршруты
Публичные

GET / — Главная
GET /products — Каталог товаров
GET /products/{product:slug} — Карточка товара

Корзина и заказы

POST /cart/add — Добавить товар в корзину
GET /cart — Просмотр корзины
DELETE /cart/{cartItem} — Удалить из корзины
POST /checkout — Оформить заказ

Продавец (после авторизации)

/seller/dashboard
/seller/products
/seller/orders


🧠 Бизнес-логика

Один пользователь может быть одновременно покупателем и продавцом
Товары привязаны к конкретному продавцу (seller_id)
Корзина хранится в базе данных (поддерживает несколько устройств)
При оформлении заказа автоматически создаётся Order и связанные OrderItem
Заказ может содержать товары от разных продавцов
Статусы заказов обновляются через сервис OrderService
Используются политики для защиты действий продавцов


🔮 Планы развития

 Интеграция платёжных систем (Stripe / YooKassa / LiqPay)
 Отзывы и рейтинг товаров и продавцов
 Расширенные фильтры и поиск
 Избранное (Wishlist)
 Чат покупатель ↔ продавец
 Админ-панель (Filament)
 Мобильное API
 Мультиязычность


📄 Команды Artisan
Bashphp artisan make:seller          # Создать нового продавца
php artisan db:seed --class=MarketplaceSeeder
php artisan optimize:clear

🤝 Вклад в проект
Буду рад pull request'ам и предложениям по улучшению!

Сделано с ❤️ и Laravel
Если проект тебе понравился — поставь звезду ⭐ на GitHub!

Автор: Ruslan
Город: Баку, Азербайджан
Дата создания: Апрель 2026
