<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>

    <div class="py-6">
      <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">

        <form method="GET" action="{{ route('products.index') }}">
            <div>
                <label for="product_name">商品名</label>
                <input type="text" name="product_name" id="product_name">
            </div>

            <div>
                <label for="min_price">最低価格</label>
                <input type="number" name="min_price" id="min_price" value="">
            </div>

            <div>
                <label for="max_price">最高価格</label>
                <input type="number" name="max_price" id="max_price" value="">
            </div>

            <button type="submit">検索</button>
        </form>

        <div class="mt-6">
            @foreach ($products as $product)
               <div class="mb-4 p-4 bg-white shadow rounded">

                  <p>商品番号 : {{ $product->id }}</p>

                  <p>商品名 : {{ $product->product_name }}</p>

                  <p>商品説明 : {{ $product->description }}</p>

                  @if ($product->img_path)
                    <img src="{{ asset('storage/' . $product->img_path) }}"
                         alt="{{ $product->product_name }}"
                         class="w-32 h-32 object-cover">
                  @endif

                  <p>料金 : {{ $product->price }}</p>
                  <a href="{{ route('products.show', $product) }}">
                    詳細
                  </a>
               </div>
            @endforeach
        </div>
      </div>
    </div>
</x-app-layout>





