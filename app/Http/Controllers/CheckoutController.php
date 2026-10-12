<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        if (!$cart) {
            return redirect()->route('cart.index')->withErrors(['cart' => 'Keranjang masih kosong.']);
        }

        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        if ($products->count() !== count($cart)) {
            return redirect()->route('cart.index')->withErrors(['cart' => 'Keranjang berisi produk yang sudah tidak tersedia.']);
        }

        $items = $products->map(fn (Product $product) => [
            'product' => $product,
            'qty' => (int) $cart[$product->id],
            'subtotal' => $product->price * (int) $cart[$product->id],
        ]);
        $total = $items->sum('subtotal');

        return view('checkout', compact('items', 'total'));
    }

    public function store()
    {
        $cart = session('cart', []);
        if (!$cart) {
            return redirect()->route('cart.index')->withErrors(['cart' => 'Keranjang masih kosong.']);
        }

        DB::transaction(function () use ($cart) {
            foreach ($cart as $productId => $qty) {
                $product = Product::query()->lockForUpdate()->find($productId);
                if (!$product || (int) $qty < 1 || (int) $qty > $product->stock) {
                    throw ValidationException::withMessages([
                        'cart' => 'Stok atau ketersediaan produk berubah. Periksa kembali keranjang Anda.',
                    ]);
                }

                Order::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'qty' => (int) $qty,
                    'total' => $product->price * (int) $qty,
                ]);
                $product->decrement('stock', (int) $qty);
            }
        });

        session()->forget('cart');

        return redirect()->route('home.index')->with('success', 'Pesanan berhasil dibuat. Terima kasih sudah berbelanja!');
    }
}
