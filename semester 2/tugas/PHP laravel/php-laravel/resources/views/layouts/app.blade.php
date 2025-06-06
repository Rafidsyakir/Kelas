<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TokoOnline - E-commerce Terpercaya')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: #2563eb !important;
        }
        
        .btn-primary {
            background-color: #2563eb;
            border-color: #2563eb;
        }
        
        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
        }
        
        .card {
            border: none;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
        }
        
        .hero-section {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
        }
        
        .product-img {
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        
        .sidebar {
            min-height: calc(100vh - 76px);
            background-color: white;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .sidebar .nav-link {
            color: #6b7280;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 8px;
            transition: all 0.2s;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #eff6ff;
            color: #2563eb;
        }
        
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px;
        }
        
        .stats-card.success {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
        }
        
        .stats-card.warning {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }
        
        .stats-card.info {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }
        
        .footer {
            background-color: #1f2937;
            color: #d1d5db;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-shop me-2"></i>TokoOnline
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                    </li>
                </ul>
                
                <!-- Search Form -->
                <form class="d-flex me-3" method="GET" action="{{ route('products.index') }}">
                    <div class="input-group">
                        <input class="form-control" type="search" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                <i class="bi bi-cart3"></i>
                                @if(auth()->user()->cartItems->count() > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ auth()->user()->cartItems->sum('quantity') }}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->full_name }}
                            </a>
                            <ul class="dropdown-menu">
                                @if(auth()->user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-speedometer2 me-2"></i>Dashboard Admin
                                    </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-person me-2"></i>Profil
                                </a></li>
                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-bag me-2"></i>Pesanan Saya
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-white mb-3">TokoOnline</h5>
                    <p>Platform e-commerce terpercaya untuk semua kebutuhan belanja online Anda.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-decoration-none"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-decoration-none"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-decoration-none"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-decoration-none"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Kategori</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light-emphasis">Electronics</a></li>
                        <li><a href="#" class="text-decoration-none text-light-emphasis">Fashion</a></li>
                        <li><a href="#" class="text-decoration-none text-light-emphasis">Home & Living</a></li>
                        <li><a href="#" class="text-decoration-none text-light-emphasis">Sports</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Customer Service</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light-emphasis">Pusat Bantuan</a></li>
                        <li><a href="#" class="text-decoration-none text-light-emphasis">Hubungi Kami</a></li>
                        <li><a href="#" class="text-decoration-none text-light-emphasis">Info Pengiriman</a></li>
                        <li><a href="#" class="text-decoration-none text-light-emphasis">Kebijakan Return</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6 class="text-white mb-3">Kontak</h6>
                    <p><i class="bi bi-envelope me-2"></i>support@tokoonline.com</p>
                    <p><i class="bi bi-telephone me-2"></i>+62 21 1234 5678</p>
                    <p><i class="bi bi-whatsapp me-2"></i>+62 812 3456 7890</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 TokoOnline. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
