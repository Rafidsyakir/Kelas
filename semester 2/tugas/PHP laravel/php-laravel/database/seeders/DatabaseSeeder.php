<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'username' => 'admin',
            'email' => 'admin@tokoonline.com',
            'password' => Hash::make('admin123'),
            'full_name' => 'Administrator',
            'role' => 'admin',
        ]);

        // Create Sample Customers
        User::create([
            'username' => 'john_doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'John Doe',
            'phone' => '081234567890',
            'address' => 'Jl. Sudirman No. 123, Jakarta',
            'role' => 'customer',
        ]);

        User::create([
            'username' => 'jane_smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Jane Smith',
            'phone' => '081234567891',
            'address' => 'Jl. Thamrin No. 456, Jakarta',
            'role' => 'customer',
        ]);

        // Create Sample Products
        $products = [
            [
                'name' => 'Laptop Gaming ASUS ROG Strix G15',
                'description' => 'Laptop gaming dengan processor AMD Ryzen 7, RTX 3060, RAM 16GB, SSD 512GB',
                'price' => 15000000,
                'stock' => 10,
                'category' => 'Electronics',
                'image' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=400&fit=crop&crop=center',
                'status' => 'active',
            ],
            [
                'name' => 'Smartphone Samsung Galaxy S23',
                'description' => 'Smartphone flagship dengan kamera 50MP, layar Dynamic AMOLED 6.1 inch',
                'price' => 8000000,
                'stock' => 25,
                'category' => 'Electronics',
                'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=400&fit=crop&crop=center',
                'status' => 'active',
            ],
            [
                'name' => 'Sepatu Nike Air Max 270',
                'description' => 'Sepatu olahraga dengan teknologi Air Max untuk kenyamanan maksimal',
                'price' => 1500000,
                'stock' => 50,
                'category' => 'Fashion',
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop&crop=center',
                'status' => 'active',
            ],
            [
                'name' => 'Tas Ransel Eiger Daypack',
                'description' => 'Tas ransel outdoor dengan material tahan air dan desain ergonomis',
                'price' => 500000,
                'stock' => 30,
                'category' => 'Fashion',
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=400&fit=crop&crop=center',
                'status' => 'active',
            ],
            [
                'name' => 'Kamera Canon EOS R6 Mark II',
                'description' => 'Kamera mirrorless full-frame dengan sensor 24.2MP dan video 4K',
                'price' => 12000000,
                'stock' => 8,
                'category' => 'Electronics',
                'image' => 'https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=400&h=400&fit=crop&crop=center',
                'status' => 'active',
            ],
            [
                'name' => 'Jam Tangan Casio G-Shock',
                'description' => 'Jam tangan digital tahan air dengan fitur stopwatch dan alarm',
                'price' => 2500000,
                'stock' => 20,
                'category' => 'Fashion',
                'image' => 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=400&h=400&fit=crop&crop=center',
                'status' => 'active',
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        // Create Sample Orders
        $order1 = Order::create([
            'customer_id' => 2,
            'total_amount' => 15500000,
            'status' => 'processing',
            'shipping_address' => 'Jl. Sudirman No. 123, Jakarta',
            'payment_method' => 'Credit Card',
            'order_date' => now(),
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => 1,
            'quantity' => 1,
            'price' => 15000000,
            'subtotal' => 15000000,
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => 4,
            'quantity' => 1,
            'price' => 500000,
            'subtotal' => 500000,
        ]);
    }
}
