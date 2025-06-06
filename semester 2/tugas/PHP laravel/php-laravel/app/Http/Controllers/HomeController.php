<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::active()
            ->inStock()
            ->take(8)
            ->get();

        $categories = Product::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        return view('home', compact('featuredProducts', 'categories'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
