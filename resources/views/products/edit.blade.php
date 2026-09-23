<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品編集
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <form method="POST"
                      action="{{ route('products.update', $product) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

<div class="mt-4">
    <label for="product_name">商品名</label>

    <input type="text"
           name="product_name"
           id="product_name"
           value="{{ old('product_name', $product->product_name) }}"
           required>

    @error('product_name')
        <p>{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
<label for="price">価格</label>

    <input type="number"
           name="price"
           id="price"
           value="{{ old('price', $product->price) }}"
           min="0"
           required>

    @error('price')
        <p>{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
<label for="description">商品説明</label>

    <textarea name="description"
              id="description"
              required>{{ old('description', $product->description) }}</textarea>

    @error('description')
        <p>{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
    <label for="stock">在庫数</label>

    <input type="number"
           name="stock"
           id="stock"
           value="{{ old('stock', $product->stock) }}"
           min="0"
           required>

    @error('stock')
        <p>{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
    <p>現在の商品画像</p>

    @if ($product->img_path)
        <img src="{{ asset('storage/' . $product->img_path) }}"
             alt="{{ $product->product_name }}"
             class="w-32 h-32 ob ject-cover mb-2">

    @endif
    <label for="img_path">商品画像を変更する</label>
    <input type="file"
           name="img_path"
           id="img_path"
           accept="image/*">

    @error('img_path')
        <p>{{ $message }}</p>
    @enderror
</div>


<div class="mt-4">
    <button type="submit">
        更新する
    </button>

    <a href="{{ route('products.show', $product) }}">
        戻る
    </a>
</div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
