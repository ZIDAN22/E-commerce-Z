<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

it('lets visitors add available products to the session cart', function () {
    $category = Category::create(['name' => 'Elektronik']);
    $product = Product::create([
        'nameProd' => 'Headphone',
        'category_id' => $category->id,
        'price' => 250000,
        'stock' => 2,
    ]);

    $this->post(route('cart.store'), ['product_id' => $product->id])
        ->assertRedirect(route('cart.index'))
        ->assertSessionHas('cart', [$product->id => 1]);

    $this->get(route('cart.index'))
        ->assertOk()
        ->assertSee('Headphone')
        ->assertSee('Rp 250.000');
});

it('rejects cart quantities above available stock', function () {
    $category = Category::create(['name' => 'Elektronik']);
    $product = Product::create([
        'nameProd' => 'Mouse',
        'category_id' => $category->id,
        'price' => 100000,
        'stock' => 1,
    ]);

    $this->from(route('home.index'))
        ->post(route('cart.store'), ['product_id' => $product->id, 'qty' => 2])
        ->assertSessionHasErrors('qty')
        ->assertSessionMissing('cart');
});

it('creates an order and reduces stock when checkout succeeds', function () {
    $user = User::factory()->create();
    $category = Category::create(['name' => 'Elektronik']);
    $product = Product::create([
        'nameProd' => 'Keyboard',
        'category_id' => $category->id,
        'price' => 300000,
        'stock' => 5,
    ]);

    $this->actingAs($user)
        ->withSession(['cart' => [$product->id => 2]])
        ->post(route('checkout.store'))
        ->assertRedirect(route('home.index'))
        ->assertSessionMissing('cart');

    $this->assertDatabaseHas('orders', [
        'user_id' => $user->id,
        'product_id' => $product->id,
        'qty' => 2,
        'total' => 600000,
    ]);
    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'stock' => 3,
    ]);
});

it('does not partially create orders when checkout stock has changed', function () {
    $user = User::factory()->create();
    $category = Category::create(['name' => 'Elektronik']);
    $firstProduct = Product::create([
        'nameProd' => 'Keyboard',
        'category_id' => $category->id,
        'price' => 300000,
        'stock' => 5,
    ]);
    $outOfStockProduct = Product::create([
        'nameProd' => 'Mouse',
        'category_id' => $category->id,
        'price' => 100000,
        'stock' => 1,
    ]);

    $this->actingAs($user)
        ->withSession(['cart' => [$firstProduct->id => 1, $outOfStockProduct->id => 2]])
        ->from(route('checkout.index'))
        ->post(route('checkout.store'))
        ->assertSessionHasErrors('cart');

    expect(Order::count())->toBe(0);
    $this->assertDatabaseHas('products', ['id' => $firstProduct->id, 'stock' => 5]);
});

it('supports creating and editing products from the admin catalog', function () {
    $user = User::factory()->create();
    $category = Category::create(['name' => 'Elektronik']);

    $this->actingAs($user)
        ->post(route('product.store'), [
            'nameProd' => 'Speaker',
            'category_id' => $category->id,
            'Desc' => 'Portable speaker',
            'price' => 500000,
            'stock' => 4,
        ])
        ->assertRedirect(route('product.index'));

    $product = Product::where('nameProd', 'Speaker')->firstOrFail();

    $this->actingAs($user)
        ->put(route('product.update', $product), [
            'nameProd' => 'Bluetooth Speaker',
            'category_id' => $category->id,
            'Desc' => 'Updated description',
            'price' => 550000,
            'stock' => 3,
        ])
        ->assertRedirect(route('product.index'));

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'nameProd' => 'Bluetooth Speaker',
        'price' => 550000,
        'stock' => 3,
    ]);
});

it('supports category management and prevents deleting categories that contain products', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('category.store'), ['name' => 'Audio'])
        ->assertRedirect(route('category.index'));

    $category = Category::where('name', 'Audio')->firstOrFail();

    $this->put(route('category.update', $category), ['name' => 'Audio Video'])
        ->assertRedirect(route('category.index'));

    $product = Product::create([
        'nameProd' => 'Speaker',
        'category_id' => $category->id,
        'price' => 500000,
        'stock' => 1,
    ]);

    $this->delete(route('category.destroy', $category))
        ->assertSessionHasErrors('category');

    $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Audio Video']);

    $product->delete();
    $this->delete(route('category.destroy', $category))
        ->assertRedirect(route('category.index'));
    $this->assertDatabaseMissing('categories', ['id' => $category->id]);
});
