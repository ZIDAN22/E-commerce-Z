@extends('layouts.cs')

@section('content')
<style>
    body {
        background: #181818 !important;
        color: #e5c97b !important;
    }
    .hero {
        background: linear-gradient(135deg, #181818 80%, #e5c97b 100%);
        color: #e5c97b;
        padding: 60px 0 40px 0;
    }
    .hero h1 {
        font-weight: 700;
        color: #e5c97b;
        letter-spacing: 2px;
    }
    .hero .lead {
        color: #bfa14a;
    }
    .btn-primary, .btn-outline-primary {
        background: #e5c97b;
        color: #181818;
        border: none;
        font-weight: 600;
        transition: background 0.2s, color 0.2s;
    }
    .btn-primary:hover, .btn-outline-primary:hover {
        background: #bfa14a;
        color: #181818;
    }
    .product-card {
        background: #232323;
        border: 1px solid #bfa14a;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(229,201,123,0.07);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .product-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 6px 24px rgba(229,201,123,0.15);
    }
    .product-card .card-title {
        color: #e5c97b;
        font-weight: 600;
    }
    .product-card .fw-bold.text-primary {
        color: #bfa14a !important;
    }
    .pagination .page-link {
        background: #232323;
        color: #e5c97b;
        border: 1px solid #bfa14a;
    }
    .pagination .page-item.active .page-link {
        background: #e5c97b;
        color: #181818;
        border: 1px solid #e5c97b;
    }
    .bg-primary {
        background: linear-gradient(90deg, #bfa14a 60%, #181818 100%) !important;
        color: #181818 !important;
    }
    .btn-light {
        background: #181818;
        color: #e5c97b;
        border: 1px solid #e5c97b;
    }
    .btn-light:hover {
        background: #e5c97b;
        color: #181818;
    }
</style>

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1>Belanja Mudah & Cepat</h1>
        <p class="lead">Temukan produk favoritmu dengan harga terbaik</p>
        <a href="#produk" class="btn btn-lg btn-primary mt-3">Belanja Sekarang</a>
    </div>
</section>

<!-- Produk Section -->
<div class="container my-5" id="produk">
    <h2 class="mb-4 text-center fw-bold">Produk Populer</h2>
    <div class="row g-4">
        <!-- Produk 1 -->
        @foreach ($prod as $p)
        <div class="col-md-3 col-sm-6">
            <div class="card product-card h-100">
                <img src="{{$p->image}}" class="card-img-top" alt="Produk 1">
                <div class="card-body text-center">
                    <h6 class="card-title">{{$p->nameProd}}</h6>
                    <p class="fw-bold text-primary">Rp. {{number_format($p->price,0,',','.')}}</p>
                    <a href="#" class="btn btn-outline-primary btn-sm w-100">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-md-12">
            {{$prod->links()}}
        </div>

        <!-- Promo Banner -->
        <div class="container my-5">
            <div class="p-5 text-center bg-primary text-white rounded-3">
                <h2>Diskon Spesial Akhir Pekan!</h2>
                <p>Nikmati potongan harga hingga 50% untuk produk pilihan.</p>
                <a href="#" class="btn btn-light">Lihat Promo</a>
            </div>
        </div>
        @endsection