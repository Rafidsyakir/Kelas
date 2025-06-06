@extends('layouts.app')

@section('title', 'TokoOnline - Belanja Online Terpercaya')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Belanja Online Terpercaya</h1>
                <p class="lead mb-4">Temukan produk berkualitas dengan harga terbaik. Pengiriman cepat ke seluruh Indonesia.</p>
                <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">
                    <i class="bi bi-bag-plus me-2"></i>Mulai Belanja
                </a>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=500&h=400&fit=crop&crop=center" 
                     alt="Shopping" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4 mb-4">
                <div class="p-4">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-truck fs-4"></i>
                    </div>
                    <h5>Pengiriman Cepat</h5>
                    <p class="text-muted">Pengiriman gratis untuk pembelian di atas Rp 100.000</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="p-4">
                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-shield-check fs-4"></i>
                    </div>
                    <h5>Kualitas Terjamin</h5>
                    <p class="text-muted">Semua produk telah melalui quality control yang ketat</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="p-4">
                    <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-headset fs-4"></i>
                    </div>
                    <h5>Customer Service 24/7</h5>
                    <p class="text-muted">Tim support yang siap membantu Anda kapan saja</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Produk Unggulan</h2>
            <p class="text-muted">Pilihan terbaik dari berbagai kategori produk dengan kualitas terjamin</p>
        </div>
        
        <div class="row">
            @foreach($featuredProducts as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="position-relative">
                        <img src="{{ $product->image ?: 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=400&h=300&fit=crop&crop=center' }}" 
                             class="card-img-top product-img" alt="{{ $product->name }}">
                        <span class="badge bg-primary position-absolute top-0 start-0 m-2">{{ $product->category }}</span>
                        @if($product->stock < 10)
                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">Stok Terbatas</span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($product->description, 60) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-bold text-primary fs-5">{{ $product->formatted_price }}</span>
                            <small class="text-muted">Stok: {{ $product->stock }}</small>
                        </div>
                        <div class="d-grid gap-2">
                            @auth
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="bi bi-cart-plus me-1"></i>Tambah ke Keranjang
                                </button>
                            </form>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-cart-plus me-1"></i>Tambah ke Keranjang
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg">
                Lihat Semua Produk <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="fw-bold mb-3">Dapatkan Penawaran Terbaik</h3>
                <p class="text-muted mb-4">Berlangganan newsletter kami dan dapatkan update produk terbaru serta penawaran menarik</p>
                <form class="d-flex gap-2">
                    <input type="email" class="form-control" placeholder="Masukkan email Anda">
                    <button type="submit" class="btn btn-primary">Berlangganan</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
