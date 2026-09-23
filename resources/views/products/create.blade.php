<x-app-layout>
    <x-slot name="header">
        <h2 class="front-semibold text-x1 text-gray-800 leading-tight">
            商品新規登録
        </h2>
</x-slot>

<div class="py-6">
    <div class="max-w-4x1 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow rounded">

            <form method="POST"
                  action="{{ route('products.store') }}"
                  enctype="multipart/form-data">
                @csrf

<div class="mt-4">
    <label for="product_name">商品名</label>

    <input type="text"
           name="product_name"
           id="product_name"
           valiue="{{ old('product_name') }}"
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
           value="{{ old('price') }}"
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
              required>{{ old('description') }}</textarea>

    @error('description')
        <p>{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
    <label for="stock">在庫数</label>

    <input type="number"
           name="stock"
           id="stock"
           value="{{ old('stock') }}"
           min="0"
           required>

    @error('stock')
        <p>{{ $message }}</P>
    @enderror
</div>

<div class="mt-4">
    <label for="img_path">商品画像</label>

    <input type="file"
           name="img_path"
           id="img_path"
           accept="image/*"
           required>

    @error('img_path')
         <p>{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
    <button type="submit">
        登録する
    </button>

    <a href="{{ route('mypage') }}">
        戻る
    </a>
</div>

</form>

        </div>
    </div>
</div>
</x-app-layout>