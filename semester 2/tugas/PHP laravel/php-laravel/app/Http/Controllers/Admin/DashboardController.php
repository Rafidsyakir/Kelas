<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $stats = [
            'total_customers' => User::where('role', 'customer')->count(),
            'total_products' => Product::count(),
            'total_orders' => Order::whereDate('created_at', today())->count(),
            'today_revenue' => Order::whereDate('created_at', today())->sum('total_amount'),
            'monthly_revenue' => Order::whereMonth('created_at', now()->month)->sum('total_amount'),
            'pending_orders' => Order::where('status', 'pending')->count(),
        ];

        $recentOrders = Order::with('customer')
            ->latest()
            ->take(5)
            ->get();

        $recentCustomers = User::where('role', 'customer')
            ->latest()
            ->take(5)
            ->get();

        $monthlyData = $this->getMonthlyRevenue();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'recentCustomers', 'monthlyData'));
    }

    private function getMonthlyRevenue()
    {
        $months = [];
        $revenues = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M Y');
            $revenues[] = Order::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->sum('total_amount');
        }

        return [
            'months' => $months,
            'revenues' => $revenues,
        ];
    }
}
