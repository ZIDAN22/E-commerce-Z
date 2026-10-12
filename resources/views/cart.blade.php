@extends('layouts.cs')
@section('title', 'Keranjang Belanja')
@section('content')
<div class="container my-5">
    <div class="cart-container">
        <h1 class="mb-4 text-center fw-bold">Keranjang Belanja</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($items->isEmpty())
            <p class="text-center">Keranjang Anda masih kosong.</p>
        @else
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if ($item['product']->image)
                                            <img src="{{ asset('storage/' . $item['product']->image) }}" class="me-3 rounded"
                                                 alt="{{ $item['product']->nameProd }}" style="height: 64px; width: 64px; object-fit: cover;">
                                        @endif
                                        <span>{{ $item['product']->nameProd }}</span>
                                    </div>
                                </td>
                                <td>Rp {{ number_format($item['product']->price, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item['product']->id) }}" method="POST" class="d-flex gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="qty" value="{{ $item['qty'] }}" min="1"
                                               max="{{ $item['product']->stock }}" class="form-control form-control-sm" style="width: 90px;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Ubah</button>
                                    </form>
                                </td>
                                <td>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.destroy', $item['product']->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mt-4">
                <a href="{{ route('home.index') }}#produk" class="btn btn-outline-secondary">Lanjut Belanja</a>
                <div class="text-md-end">
                    <h2 class="h5">Total: Rp {{ number_format($total, 0, ',', '.') }}</h2>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg mt-2">Lanjut ke Checkout</a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
