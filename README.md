# Luxe Furniture — Laravel 11 E-commerce

Aplikasi e-commerce furnitur premium dibangun dengan **Laravel 11**, **Tailwind CSS**, dan **Alpine.js**.

## Prasyarat

- PHP 8.2+
- Composer
- Node.js 18+ & NPM
- MySQL 8.0+

## 🚀 Quick Start (Jalankan setup.bat)

1. **Buat database MySQL:**
   ```sql
   CREATE DATABASE laravel_furniture;
   ```

2. **Edit kredensial database** di `.env` (sesuaikan `DB_USERNAME` dan `DB_PASSWORD` Anda)

3. **Jalankan setup script:**
   ```bash
   setup.bat
   ```
   *(atau jalankan step-by-step di bawah)*

## Manual Setup

```bash
# Install PHP dependencies
composer install

# Generate app key
php artisan key:generate

# Install & build frontend
npm install
npm run build

# Buat symlink storage
php artisan storage:link

# Migrasi DB + seeder
php artisan migrate:fresh --seed

# Jalankan server
php artisan serve
```

## 🌐 URL Akses

| Halaman | URL |
|---|---|
| 🏠 Homepage | http://127.0.0.1:8000 |
| 📦 Produk | http://127.0.0.1:8000/products |
| 🛒 Keranjang | http://127.0.0.1:8000/cart |
| 💳 Checkout | http://127.0.0.1:8000/checkout |
| 🔐 Admin Login | http://127.0.0.1:8000/admin/login |

## 👤 Admin Credentials

| | |
|---|---|
| **Email** | admin@furniture.com |
| **Password** | password |

## 📦 Fitur

### User Side
- Landing page dengan hero, featured products, category showcase
- Product listing dengan filter kategori (Kursi, Meja, Sofa)
- Product detail dengan qty selector (Alpine.js)
- Shopping cart berbasis session
- Checkout dengan 4 metode pembayaran (Bank Transfer, OVO, Dana, QRIS)
- Order success page dengan instruksi pembayaran

### Admin Panel
- Login aman dengan guard terpisah
- Dashboard dengan stat cards & low stock alerts
- CRUD Produk lengkap dengan image upload
- Manajemen Pesanan dengan update status (Pending/Success/Cancelled)

## 🗂️ Struktur Proyek

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── ProductController.php
│   │   ├── CartController.php
│   │   ├── CheckoutController.php
│   │   └── Admin/
│   │       ├── AuthController.php
│   │       ├── DashboardController.php
│   │       ├── ProductController.php
│   │       └── OrderController.php
│   └── Middleware/
│       └── AdminAuthenticate.php
├── Models/
│   ├── Admin.php
│   ├── Product.php
│   ├── Order.php
│   └── OrderItem.php
database/
├── migrations/ (4 files)
└── seeders/
    ├── AdminSeeder.php
    └── ProductSeeder.php (18 products)
resources/views/
├── layouts/app.blade.php
├── home/index.blade.php
├── products/ (index, show)
├── cart/index.blade.php
├── checkout/ (index, success)
└── admin/
    ├── layouts/app.blade.php
    ├── auth/login.blade.php
    ├── dashboard/index.blade.php
    ├── products/ (index, create, edit, _form)
    └── orders/ (index, show)
```
