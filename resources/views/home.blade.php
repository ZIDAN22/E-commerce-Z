@extends('layouts.app')

@section('content')
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
        <div class="col-md-3 col-sm-6">
            <div class="card product-card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Produk 1">
                <div class="card-body text-center">
                    <h6 class="card-title">Sneakers Casual</h6>
                    <p class="fw-bold text-primary">Rp 350.000</p>
                    <a href="#" class="btn btn-outline-primary btn-sm w-100">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>
        <!-- Produk 2 -->
        <div class="col-md-3 col-sm-6">
            <div class="card product-card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Produk 2">
                <div class="card-body text-center">
                    <h6 class="card-title">Jam Tangan Sport</h6>
                    <p class="fw-bold text-primary">Rp 500.000</p>
                    <a href="#" class="btn btn-outline-primary btn-sm w-100">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>
        <!-- Produk 3 -->
        <div class="col-md-3 col-sm-6">
            <div class="card product-card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Produk 3">
                <div class="card-body text-center">
                    <h6 class="card-title">Tas Kulit Premium</h6>
                    <p class="fw-bold text-primary">Rp 800.000</p>
                    <a href="#" class="btn btn-outline-primary btn-sm w-100">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>
        <!-- Produk 4 -->
        <div class="col-md-3 col-sm-6">
            <div class="card product-card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Produk 4">
                <div class="card-body text-center">
                    <h6 class="card-title">Headphone Wireless</h6>
                    <p class="fw-bold text-primary">Rp 1.200.000</p>
                    <a href="#" class="btn btn-outline-primary btn-sm w-100">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>
    </div>
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