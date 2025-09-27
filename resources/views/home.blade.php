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