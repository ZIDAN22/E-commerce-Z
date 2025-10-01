# E-commerce-Z

E-commerce-Z is a web-based e-commerce application built with Laravel, designed to provide a seamless shopping experience. It includes features for user authentication, product management, category organization, shopping cart, and checkout functionality.

## Features

- **User Authentication**: Secure login and registration system using Laravel Breeze.
- **Product Management**: Admin panel to create, view, edit, and delete products.
- **Category Management**: Organize products into categories.
- **Shopping Cart**: Add products to cart, update quantities, and proceed to checkout.
- **Order Management**: Place orders and manage order history.
- **Responsive Design**: Built with Tailwind CSS for a modern, responsive UI.
- **File Uploads**: Support for product image uploads.

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js and npm
- MySQL or another supported database

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/e-commerce-z.git
   cd e-commerce-z
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**:
   ```bash
   npm install
   ```

4. **Copy the environment file and configure**:
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your database credentials and other settings.

5. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations and seeders**:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Build assets**:
   ```bash
   npm run build
   ```

8. **Start the development server**:
   ```bash
   php artisan serve
   ```

9. **Access the application**:
   Open your browser and go to `http://localhost:8000`.

## Usage

### Admin Panel

- Access the admin dashboard at `/dashboard` after logging in.
- Manage categories at `/category`.
- Manage products at `/product`.

### Shopping

- Browse products on the home page.
- Add products to cart.
- Proceed to checkout at `/checkout`.

## Database Schema

### Categories Table
- `id`: Primary key
- `name`: Category name
- `created_at`, `updated_at`: Timestamps

### Products Table
- `id`: Primary key
- `nameProd`: Product name
- `image`: Product image path
- `category_id`: Foreign key to categories
- `Desc`: Product description
- `price`: Product price
- `stock`: Available stock
- `created_at`, `updated_at`: Timestamps

### Orders Table
- `id`: Primary key
- `user_id`: Foreign key to users
- `total`: Order total
- `status`: Order status
- `created_at`, `updated_at`: Timestamps

## API Endpoints

The application uses Laravel's resource routes for CRUD operations:

- Categories: `/category`
- Products: `/product`
- Cart: `/cart`
- Checkout: `/checkout`

## Contributing

1. Fork the repository.
2. Create a new branch for your feature.
3. Commit your changes.
4. Push to the branch.
5. Open a Pull Request.

## License

This project is licensed under the MIT License.

## Support

For support, email support@ecommercez.com or open an issue on GitHub.
