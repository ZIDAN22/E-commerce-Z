<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-xl font-semibold">
                        {{ isset($category) ? 'Edit Kategori' : 'Tambah Kategori' }}
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

                    <form action="{{ isset($category) ? route('category.update', $category) : route('category.store') }}" method="POST">
                        @csrf
                        @if (isset($category))
                            @method('PUT')
                        @endif
                        <div class="mb-6">
                            <label for="name" class="mb-1 block text-sm font-medium">Nama kategori</label>
                            <input id="name" name="name" type="text" required maxlength="255"
                                   value="{{ old('name', $category->name ?? '') }}"
                                   class="w-full rounded border-gray-300 text-gray-900" />
                        </div>
                        <div class="flex justify-end gap-3">
                            <a href="{{ route('category.index') }}" class="rounded border px-4 py-2">Batal</a>
                            <button type="submit" class="rounded bg-blue-600 px-4 py-2 font-semibold text-white">
                                {{ isset($category) ? 'Simpan Perubahan' : 'Tambah Kategori' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
