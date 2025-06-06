@extends('layouts.app')

@section('title', 'Semua Produk - TokoOnline')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Sidebar Filter -->
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="bi bi-funnel me-2"></i>Filter Produk</h6>
                </div>
                <div class="card-body">
                    <form method="GET">
                        <!-- Search -->
                        <div class="mb-3">
                            <label class="form-label">Cari Produk</label>
                            <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Nama produk...">
                        </div>
                        
                        <!-- Category Filter -->
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="category">
                                <option value="all">Semua Kategori</option>
                                @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Sort -->
                        <div class="mb-3">
                            <label class="form-label">Urutkan</label>
                            <select class="form-select" name="sort">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama A-Z</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                            </select>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Products -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">Semua Produk</h2>
                    <p class="text-muted">Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk</p>
                </div>
            </div>
            
            @if($products->count() > 0)
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
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
                            <p class="card-text text-muted small flex-grow-1">{{ Str::limit($product->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold text-primary fs-5">{{ $product->formatted_price }}</span>
                                <small class="text-muted">Stok: {{ $product->stock }}</small>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye me-1"></i>Lihat Detail
                                </a>
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
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $products->appends(request()->query())->links() }}
            </div>
            @else
            <div class="text-center py-5">
                <i class="bi bi-search display-1 text-muted"></i>
                <h4 class="mt-3">Tidak ada produk ditemukan</h4>
                <p class="text-muted">Coba ubah filter atau kata kunci pencarian</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Semua Produk</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
