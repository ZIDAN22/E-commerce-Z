@extends('layouts.cs')
@section('title', 'Halaman Keranjang')
@section('content')
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