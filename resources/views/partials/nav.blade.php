<nav class="navbar navbar-expand-lg custom-navbar shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-gold" href="#">Z.Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1" href="{{ route('home.index') }}">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1" href="#">
                        <i class="bi bi-box-seam"></i> Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1" href="{{ route('cart.index') }}">
                        <i class="bi bi-cart"></i> Keranjang
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="btn btn-outline-gold ms-2" href="{{ url('/dashboard') }}">
                                <i class="bi bi-person-circle"></i> Dashboard
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-gold ms-2" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary ms-2" href="{{ route('register') }}">
                                    <i class="bi bi-person-plus"></i> Register
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    .custom-navbar {
        background: #181818 !important;
    }
    .text-gold {
        color: #d4af37 !important;
    }
    .navbar-nav .nav-link {
        color: #e0c97f !important;
        transition: color 0.2s;
    }
    .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
        color: #fffbe6 !important;
    }
    .btn-gold {
        background: #d4af37;
        color: #181818;
        border: none;
    }
    .btn-gold:hover {
        background: #bfa133;
        color: #fff;
    }
    .btn-outline-gold {
        border: 1px solid #d4af37;
        color: #d4af37;
        background: transparent;
    }
    .btn-outline-gold:hover {
        background: #d4af37;
        color: #181818;
    }
</style>