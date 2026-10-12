<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-xl font-semibold">
                        {{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}
                    </h1>

                    @if ($errors->any())
                        <div class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ isset($product) ? route('product.update', $product) : route('product.store') }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($product))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="nameProd" class="mb-1 block text-sm font-medium">Nama produk</label>
                            <input id="nameProd" name="nameProd" type="text" required maxlength="255"
                                   value="{{ old('nameProd', $product->nameProd ?? '') }}"
                                   class="w-full rounded border-gray-300 text-gray-900" />
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="mb-1 block text-sm font-medium">Kategori</label>
                            <select id="category_id" name="category_id" required class="w-full rounded border-gray-300 text-gray-900">
                                <option value="">Pilih kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="Desc" class="mb-1 block text-sm font-medium">Deskripsi</label>
                            <textarea id="Desc" name="Desc" rows="4" class="w-full rounded border-gray-300 text-gray-900">{{ old('Desc', $product->Desc ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="mb-1 block text-sm font-medium">Harga (Rp)</label>
                            <input id="price" name="price" type="number" min="0" required
                                   value="{{ old('price', $product->price ?? '') }}"
                                   class="w-full rounded border-gray-300 text-gray-900" />
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="mb-1 block text-sm font-medium">Stok</label>
                            <input id="stock" name="stock" type="number" min="0" required
                                   value="{{ old('stock', $product->stock ?? '') }}"
                                   class="w-full rounded border-gray-300 text-gray-900" />
                        </div>

                        <div class="mb-6">
                            <label for="image" class="mb-1 block text-sm font-medium">Gambar produk</label>
                            @if (isset($product) && $product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->nameProd }}" class="mb-2 h-24 w-24 rounded object-cover">
                            @endif
                            <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                                   class="w-full rounded border border-gray-300 p-2 text-gray-900" />
                            <p class="mt-1 text-sm text-gray-500">Opsional, maksimal 2 MB.</p>
                        </div>

                        <div class="flex justify-end gap-3">
                            <a href="{{ route('product.index') }}" class="rounded border px-4 py-2">Batal</a>
                            <button type="submit" class="rounded bg-blue-600 px-4 py-2 font-semibold text-white">
                                {{ isset($product) ? 'Simpan Perubahan' : 'Tambah Produk' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
