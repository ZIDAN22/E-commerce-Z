<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $removedIds = array_diff(array_keys($cart), $products->keys()->all());

        if ($removedIds) {
            foreach ($removedIds as $removedId) {
                unset($cart[$removedId]);
            }

            session(['cart' => $cart]);
            session()->flash('warning', 'Produk yang sudah tidak tersedia dihapus dari keranjang.');
        }

        $items = $products->map(fn (Product $product) => [
            'product' => $product,
            'qty' => (int) $cart[$product->id],
            'subtotal' => $product->price * (int) $cart[$product->id],
        ]);
        $total = $items->sum('subtotal');

        return view('cart', compact('items', 'total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'qty' => ['sometimes', 'integer', 'min:1'],
        ]);
        $product = Product::findOrFail($validated['product_id']);
        $cart = session('cart', []);
        $qty = (int) ($cart[$product->id] ?? 0) + (int) ($validated['qty'] ?? 1);

        if ($qty > $product->stock) {
            throw ValidationException::withMessages([
                'qty' => "Stok {$product->nameProd} yang tersedia hanya {$product->stock}.",
            ]);
        }

        $cart[$product->id] = $qty;
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, string $productId)
    {
        $validated = $request->validate([
            'qty' => ['required', 'integer', 'min:1'],
        ]);
        $cart = session('cart', []);
        abort_unless(array_key_exists($productId, $cart), 404);

        $product = Product::findOrFail($productId);
        if ($validated['qty'] > $product->stock) {
            throw ValidationException::withMessages([
                'qty' => "Stok {$product->nameProd} yang tersedia hanya {$product->stock}.",
            ]);
        }

        $cart[$productId] = (int) $validated['qty'];
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Jumlah produk diperbarui.');
    }

    public function destroy(string $productId)
    {
        $cart = session('cart', []);
        unset($cart[$productId]);
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }
}
