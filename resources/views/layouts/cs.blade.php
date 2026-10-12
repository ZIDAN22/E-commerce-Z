<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section Custom */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),
                url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_wftatRShUmssiBtCtaoCHtOeq_WBuvzmMg&s');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2rem;
        }

        /* Card Hover Effect */
        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .cart-container {
            background: #232323;
            border: 1px solid #bfa14a;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.25);
            color: #f5e9c8;
            padding: 2rem;
        }

        .cart-container h1,
        .cart-container h2 {
            color: #ffd700;
        }

        .cart-container .table {
            --bs-table-color: #f5e9c8;
            --bs-table-bg: transparent;
            --bs-table-border-color: #444;
        }

        /* Footer */
        footer {
            background: #111;
            color: #aaa;
        }
    </style>
</head>

<body>

    @include('partials.nav')

    @yield('content')

    @include('partials.footer')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>