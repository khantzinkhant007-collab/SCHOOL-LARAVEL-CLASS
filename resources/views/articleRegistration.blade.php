@extends('layouts.kadai')

@section('pageTitle', '記事登録')
@section('title', '記事登録')

@section('content')
    <section>
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
                <div class="my-5 px-5 py-2 border-b">
                    <label class="block text-gray-500 text-sm uppercase" for="title">タイトル</label>
                    <input type="text" name="title" id="title"
                        class="w-full text-2xl font-bold leading-10 border border-gray-300 rounded-md"
                        value="{{ old('title') }}">

                    @error('title')
                        <p class="text-sm text-red-600 my-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex justify-between py-3">
                    <div class="w-4/12 mr-5">
                        <label class="block text-gray-500 text-sm uppercase" for="image">画像ファイル</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="w-full h-80 text-xs px-3 py-2 border border-gray-300 rounded-md">
                        <figure id="imagePreviewArea" class="hidden mt-3">
                            <img id="imagePreview" src="" alt="画像プレビュー"
                                class="w-32 h-24 object-cover object-top border border-gray-300 rounded-md">
                        </figure>
                        @error('image')
                            <p class="text-sm text-red-600 my-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="grow">
                        <label class="block text-gray-500 text-sm uppercase" for="body">本文</label>
                        <textarea name="body" id="body"
                            class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none">{{ old('body') }}</textarea>

                        @error('body')
                            <p class="text-sm text-red-600 my-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('articles.index') }}"
                    class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
                <button type="submit"
                    class="block w-20 text-white text-center bg-sky-600 hover:bg-sky-500 px-3 py-2 rounded-md">投稿</button>
            </div>
        </form>
    </section>

    <script>
        document.getElementById('image')?.addEventListener('change', function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const previewArea = document.getElementById('imagePreviewArea');

            if (!file) {
                preview.src = '';
                previewArea.classList.add('hidden');
                return;
            }

            preview.src = URL.createObjectURL(file);
            previewArea.classList.remove('hidden');
        });
    </script>
@endsection
