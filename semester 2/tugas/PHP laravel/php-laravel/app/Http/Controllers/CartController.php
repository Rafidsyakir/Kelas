<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('customer_id', Auth::id())
            ->get();

        $total = $cartItems->sum('subtotal');

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        $cartItem = Cart::where('customer_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity,
            ]);
        } else {
            Cart::create([
                'customer_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'added_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, Cart $cart)
    {
        $this->authorize('update', $cart);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cart->product->stock,
        ]);

        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return response()->json([
            'success' => true,
            'subtotal' => $cart->formatted_subtotal,
            'total' => Cart::where('customer_id', Auth::id())->get()->sum('subtotal'),
        ]);
    }

    public function remove(Cart $cart)
    {
        $this->authorize('delete', $cart);

        $cart->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
