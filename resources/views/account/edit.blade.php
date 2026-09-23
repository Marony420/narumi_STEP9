<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            アカウント編集
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <form method="POST" action="{{ route('account.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <label for="name">名前</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $user->name) }}"
                               required>

                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="name_kanji">名前（漢字）</label>
                        <input type="text"
                               name="name_kanji"
                               id="name_kanji"
                               value="{{ old('name_kanji', $user->name_kanji) }}"
                               required>

                        @error('name_kanji')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="name_kana">名前（カナ）</label>
                        <input type="text"
                               name="name_kana"
                               id="name_kana"
                               value="{{ old('name_kana', $user->name_kana) }}"
                               required>

                        @error('name_kana')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="email">メールアドレス</label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email', $user->email) }}"
                               required>

                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit">
                            更新する
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
