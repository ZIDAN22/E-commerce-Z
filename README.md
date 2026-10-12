# E-commerce-Z

A Laravel 12 storefront with product and category management, a session-based shopping cart, and checkout that records orders and updates product stock.

## Requirements

- PHP 8.2 or later with the Laravel-required extensions
- Composer
- Node.js and npm
- MySQL (the example environment uses a database named `commercez`)

## Setup on Windows

Run these commands from the project folder in PowerShell:

```powershell
composer install
npm install
Copy-Item .env.example .env
```

Create the MySQL database named `commercez`, then update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env` if your local MySQL settings differ. Initialize the application and database:

```powershell
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run build
```

Start the development server:

```powershell
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Features

- Browse products from the public home page and add available stock to a session cart.
- Change quantities or remove products from the cart.
- Sign in to review and submit a checkout. Orders are saved per product, stock is checked again during checkout, and successful orders reduce stock.
- Authenticated, verified users can create, edit, and delete products and categories. A category with products and a product with existing orders cannot be deleted.
- Upload product images; uploaded files are served from Laravel's public storage disk.
