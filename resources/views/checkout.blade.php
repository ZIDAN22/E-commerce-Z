@extends('layouts.cs')
@section('title', 'Checkout')
@section('content')
<div class="container my-5">
    <div class="cart-container">
        <h1 class="mb-4 text-center fw-bold">Konfirmasi Pesanan</h1>
        <p class="text-center">Periksa kembali produk dan jumlah sebelum membuat pesanan.</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item['product']->nameProd }}</td>
                            <td>Rp {{ number_format($item['product']->price, 0, ',', '.') }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th>Rp {{ number_format($total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <form action="{{ route('checkout.store') }}" method="POST" class="d-flex justify-content-between gap-3">
            @csrf
            <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">Kembali ke Keranjang</a>
            @auth
                <button type="submit" class="btn btn-primary">Buat Pesanan</button>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Checkout</a>
            @endauth
        </form>
    </div>
</div>
@endsection
