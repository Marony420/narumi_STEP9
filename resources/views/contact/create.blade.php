<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問い合わせ
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf

                    <div class="mt-4">
                        <label for="name">名前</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required>

                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                         <label for="email">メールアドレス</label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               required>

                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                       <label for="body">お問い合わせ内容</label>
                       <textarea name="body"
                                 id="body"
                                required>{{ old('body') }}</textarea>

                        @error('body')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                       <button type="submit">
                           送信する
                       </button>

                       <a href="{{ route('products.index') }}">
                           戻る
                       </a>
                    </div>
                
                </form>

            </div>
        </div>
    </div>
</x-app-layout>