@extends('layouts.cs')
@section('title', 'Halaman Keranjang')
@section('content')

<style>
    body {
        background: linear-gradient(135deg, #181818 0%, #2c2c2c 100%);
        color: #f5e9c8;
    }

    .cart-container {
        background: #232323;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.25);
        padding: 2.5rem 2rem;
    }

    .table {
        background: transparent;
        color: #f5e9c8;
    }

    .table-light th {
        background: #1a1a1a;
        color: #ffd700;
        border: none;
    }

    .table td,
    .table th {
        border-color: #333;
    }

    .form-control,
    .form-control:focus {
        background: #181818;
        color: #ffd700;
        border: 1.5px solid #ffd700;
        border-radius: 8px;
        box-shadow: none;
    }

    .btn-outline-danger {
        border-color: #ffd700;
        color: #ffd700;
        background: transparent;
        transition: background 0.2s, color 0.2s;
    }

    .btn-outline-danger:hover {
        background: #ffd700;
        color: #181818;
    }

    .btn-primary {
        background: linear-gradient(90deg, #ffd700 60%, #bfa14a 100%);
        border: none;
        color: #181818;
        font-weight: bold;
    }

    .btn-primary:hover {
        background: #ffd700;
        color: #232323;
    }

    .btn-outline-secondary {
        border-color: #ffd700;
        color: #ffd700;
        background: transparent;
    }

    .btn-outline-secondary:hover {
        background: #ffd700;
        color: #181818;
    }

    h2,
    h5,
    h6 {
        color: #ffd700;
    }

    .text-primary {
        color: #ffd700 !important;
    }
</style>

<div class="container my-5 cart-container">
    <h2 class="mb-4 fw-bold text-center">Keranjang Belanja</h2>

    <!-- Tabel Keranjang -->
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Item 1 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/80" class="me-3 rounded" alt="Produk 1"
                                style="border:2px solid #ffd700;">
                            <div>
                                <h6 class="mb-0">Sneakers Casual</h6>
                                <small class="text-muted">Ukuran: 42</small>
                            </div>
                        </div>
                    </td>
                    <td>Rp 350.000</td>
                    <td>
                        <input type="number" class="form-control form-control-sm" value="1" min="1" style="width:80px;">
                    </td>
                    <td>Rp 350.000</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                    </td>
                </tr>
                <!-- Item 2 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/80" class="me-3 rounded" alt="Produk 2"
                                style="border:2px solid #ffd700;">
                            <div>
                                <h6 class="mb-0">Headphone Wireless</h6>
                                <small class="text-muted">Warna: Hitam</small>
                            </div>
                        </div>
                    </td>
                    <td>Rp 1.200.000</td>
                    <td>
                        <input type="number" class="form-control form-control-sm" value="2" min="1" style="width:80px;">
                    </td>
                    <td>Rp 2.400.000</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Ringkasan Belanja -->
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="index.html" class="btn btn-outline-secondary">← Lanjut Belanja</a>
        </div>
        <div class="col-md-6 text-end">
            <h5>Total: <span class="text-primary">Rp 2.750.000</span></h5>
            <a href="checkout.html" class="btn btn-primary btn-lg mt-2">Lanjut ke Pembayaran</a>
        </div>
    </div>
</div>
@endsection