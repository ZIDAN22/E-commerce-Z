@extends('layouts.cs')
@section('title', 'Halaman Keranjang')
@section('content')
<style>
    body {
        background: #181818 !important;
        color: #e5c97b !important;
    }
    
    .container {
        background: #232323;
        border-radius: 16px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.12);
        padding: 32px 24px;
    }
    .table {
        background: transparent;
        color: #e5c97b;
    }
    .table-light th {
        background: #222 !important;
        color: #e5c97b !important;
        border-bottom: 2px solid #e5c97b;
    }
    .table td, .table th {
        border-color: #3a2e13;
    }
    .form-control, .form-control:focus {
        background: #181818;
        color: #e5c97b;
        border: 1px solid #e5c97b;
        box-shadow: none;
    }
    .btn-outline-danger {
        color: #e5c97b;
        border-color: #e5c97b;
        background: transparent;
    }
    .btn-outline-danger:hover {
        background: #e5c97b;
        color: #181818;
    }
    .btn-outline-secondary {
        color: #e5c97b;
        border-color: #e5c97b;
        background: transparent;
    }
    .btn-outline-secondary:hover {
        background: #e5c97b;
        color: #181818;
    }
    .btn-primary, .btn-primary:focus {
        background: #e5c97b;
        border-color: #e5c97b;
        color: #181818;
        font-weight: bold;
    }
    .btn-primary:hover {
        background: #c2a24d;
        border-color: #c2a24d;
        color: #181818;
    }
    h2, h5, h6 {
        color: #e5c97b;
    }
    .text-primary {
        color: #e5c97b !important;
    }
    .rounded {
        border: 2px solid #e5c97b;
        background: #232323;
    }
    small.text-muted {
        color: #bfae6a !important;
    }
</style>
<div class="container my-5">
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
                            <img src="https://via.placeholder.com/80" class="me-3 rounded" alt="Produk 1">
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
                            <img src="https://via.placeholder.com/80" class="me-3 rounded" alt="Produk 2">
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