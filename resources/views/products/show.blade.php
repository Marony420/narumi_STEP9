<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            商品詳細
        </h2>
    </x-slot>

    <div class="py-6">
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

                <p class="mb-2">
                    商品説明:{{ $product->description }}
                </p>

                <p class="mb-2">
                    料金:¥{{ $product->price }}
                </p>

                <p class="mb-4">
                    会社名:{{ $product->company->company_name }}
                </p>

                @if ($product->user_id === auth()->id())

                    <!-- 出品者の場合 -->
                    <a href="{{ route('products.edit', $product) }}">
                        編集する
                    </a>

                    <br>

                    <form method="POST"
                          action="{{ route('products.destroy', $product) }}"
                          onsubmit="return confirm('本当に削除しますか？');">

                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            削除する
                        </button>
                    </form>

                @else

<!-- 購入者の場合 -->

<!-- Favorite -->
                    <form method="POST"
                          action="{{ route('products.like', $product) }}">
                        @csrf

                        @if ($product->likes()->where('user_id', auth()->id())->exists())
                            <button type="submit" style="color: red;">
                                ♥ お気に入り済み
                            </button>
                        @else
                            <button type="submit">
                                ♡ お気に入り
                            </button>
                        @endif
                    </form>

<!-- Purchase -->
                    <a href="{{ route('products.purchase', $product) }}">
                        カートに追加する
                    </a>

                        @endif
                    <br>

                <a href="{{ route('products.index') }}">
                    戻る
                </a>
            </div>
        </div>
    </div>
</x-app-layout>


