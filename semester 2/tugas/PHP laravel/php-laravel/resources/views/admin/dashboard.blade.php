@extends('admin.layouts.app')

@section('title', 'Dashboard Admin - TokoOnline')

@section('content')
<div class="py-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-download me-1"></i>Export
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold">{{ number_format($stats['total_customers']) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-people fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card success text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Produk</div>
                            <div class="h5 mb-0 font-weight-bold">{{ number_format($stats['total_products']) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-box fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card info text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold">{{ number_format($stats['total_orders']) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-bag fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card warning text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Revenue Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold">Rp {{ number_format($stats['today_revenue'], 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-currency-dollar fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Orders -->
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Pesanan Terbaru</h6>
                    <a href="#" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->customer->full_name }}</td>
                                    <td>{{ $order->formatted_total }}</td>
                                    <td>
                                        <span class="badge bg-{{ $order->status_badge }}">{{ ucfirst($order->status) }}</span>
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Produk
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-bag me-2"></i>Pesanan Pending ({{ $stats['pending_orders'] }})
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-bar-chart me-2"></i>Laporan Penjualan
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-people me-2"></i>Kelola Pelanggan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Customers -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Pelanggan Baru</h6>
                </div>
                <div class="card-body">
                    @foreach($recentCustomers->take(3) as $customer)
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">{{ $customer->full_name }}</h6>
                            <small class="text-muted">{{ $customer->email }}</small>
                        </div>
                        <small class="text-muted">{{ $customer->created_at->diffForHumans() }}</small>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
