<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            マイページ
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- ユーザー情報 -->
            <div class="bg-white p-6 shadow rounded mb-6">
                <h3 class="text-xl font-bold mb-4">
                    ユーザー情報
                </h3>

                <p>名前：{{ $user->name }}</p>
                <p>名前（漢字）：{{ $user->name_kanji }}</p>
                <p>名前（カナ）：{{ $user->name_kana }}</p>
                <p>メールアドレス：{{ $user->email }}</p>

                <div class="mt-4">
                    <a href="{{ route('account.edit') }}">
                        アカウント編集
                    </a>
                </div>
            </div>


            <!-- 商品新規登録 -->
            <div class="mb-6">
                <a href="{{ route('products.create') }}">
                    商品を新規登録する
                </a>
            </div>


            <!-- 出品した商品 -->
            <div class="bg-white p-6 shadow rounded mb-6">
                <h3 class="text-xl font-bold mb-4">
                       出品した商品
                </h3>

                @foreach ($products as $product)
                    <div class="mb-4">
                        <p>商品番号：{{ $product->id }}</p>
                        <p>商品名：{{ $product->product_name }}</p>
                        <p>商品説明：{{ $product->description }}</p>
                        <p>料金：¥{{ $product->price }}</p>

                        <a href="{{ route('products.show', $product) }}">
                            詳細
                        </a>
                    </div>
                @endforeach
            </div>


            <!-- 購入履歴 -->
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-xl font-bold mb-4">
                   購入履歴
                </h3>

                @foreach ($sales as $sale)
                   <div class="mb-4">
                       <p>商品名：{{ $sale->product->product_name }}</p>
                       <p>商品説明：{{ $sale->product->description }}</p>
                       <p>料金：¥{{ $sale->product->price }}</p>
                       <p>購入個数：{{ $sale->quantity }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>