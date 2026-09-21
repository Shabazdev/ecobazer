# Ecobazar Laravel 12 E-Commerce Application

A complete, production-ready Laravel 12 conversion of the Ecobazar E-Commerce website, featuring MySQL integration, Laravel authentication (Breeze), admin and customer roles, product & category CRUD, real shopping cart, cash on delivery checkout flow, order history & management, secure image uploads, and REST API endpoints.

---

## 📁 Project Folder Structure

```text
laravel-backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   └── AdminController.php
│   │   │   ├── Auth/
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   └── RegisteredUserController.php
│   │   │   ├── Api/
│   │   │   │   ├── CategoryController.php
│   │   │   │   ├── OrderController.php
│   │   │   │   └── ProductController.php
│   │   │   └── Web/
│   │   │       ├── CartController.php
│   │   │       ├── CheckoutController.php
│   │   │       ├── HomeController.php
│   │   │       └── ShopController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── CartItem.php
│       ├── Category.php
│       ├── Order.php
│       ├── OrderItem.php
│       ├── Product.php
│       ├── User.php
│       └── Wishlist.php
├── config/
│   └── cors.php
├── database/
│   ├── migrations/ (Users, Categories, Products, Orders, OrderItems, CartItems, Wishlists)
│   └── seeders/ (DatabaseSeeder, CategorySeeder, ProductSeeder)
├── resources/
│   └── views/
│       ├── admin/ (dashboard, products, categories, orders)
│       ├── auth/ (login, register)
│       ├── layouts/ (app.blade.php)
│       ├── home.blade.php
│       ├── shop.blade.php
│       ├── product-details.blade.php
│       ├── cart.blade.php
│       ├── checkout.blade.php
│       ├── order-details.blade.php
│       ├── order-history.blade.php
│       ├── dashboard.blade.php
│       ├── wishlist.blade.php
│       ├── about.blade.php
│       ├── contact.blade.php
│       ├── faq.blade.php
│       ├── blog-list.blade.php
│       ├── single-blog.blade.php
│       ├── account-setting.blade.php
│       └── 404.blade.php
├── routes/
│   ├── api.php
│   ├── web.php
│   └── auth.php
├── .env.example
├── composer.json
└── render.yaml
```

---

## ⚙️ Local Setup Commands

1. **Install Dependencies**
   ```bash
   cd laravel-backend
   composer install
   ```

2. **Environment Configuration**
   Copy `.env.example` to `.env` and generate application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure MySQL in `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecobazar_db
   DB_USERNAME=root
   DB_PASSWORD=your_mysql_password
   ```

4. **Run Migrations & Seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Note: This seeds demo categories, realistic products, an Admin user (`admin@ecobazar.com` / `password`), and a Customer user (`customer@ecobazar.com` / `password`).*

5. **Link Storage for Image Uploads**
   ```bash
   php artisan storage:link
   ```

6. **Start Local Development Server**
   ```bash
   php artisan serve
   ```

---

## 🚀 Deployment Steps (Render)

1. Create a new **MySQL** database instance on Render.
2. Connect your GitHub repository to Render as a **Web Service** (PHP environment).
3. Render automatically utilizes `render.yaml`.
4. Build and Start commands handled by Render:
   - **Build Command**: `composer install --no-dev --optimize-autoloader && php artisan config:cache && php artisan migrate --force && php artisan db:seed --force && php artisan storage:link`
   - **Start Command**: `php artisan serve --host=0.0.0.0 --port=$PORT`
