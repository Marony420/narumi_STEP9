<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            商品購入
        </h2>
    </x-slot>

    <div clas="py-6">
        <div class="max-w-4x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <h3 class="text-x1 font-bold mb-4">
                    {{ $product->product_name }}
                </h3>

                @if ($product->img_path)
                    <img src="{{ asset('storage/' . $product->img_path) }}"
                         alt="{{ $product->product_name }}"
                         class="w-64 h-64 object-cover mb-4">
                @endif

                <p>商品説明 : {{ $product->description }}</p>

                <p>料金 : ¥{{ $product->price }}</p>
                
                <p>在庫 : {{ $product->stock }}</p>
                
                <p>会社名 : {{ $product->company->company_name }}</p>
            
            <form method="POST" action="{{ route('products.purchase.store', $product) }}" onsubmit="return confirm('購入しますか？');">
                @csrf

                <div class="mt-4">
                    <label for="quantity">購入個数</label>
                    <input type="number"
                           name="quantity"
                           id="quantity"
                           min="1"
                           max="{{ $product->stock }}"
                           value="1">

                    @error('quantity')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit">
                        購入する
                    </button>
                </div>
            </form>
                    <a href="{{ route('products.show', $product) }}">
                        戻る
                    </a>
                
            </div>
        </div>
    </div>
</x-app-layout>