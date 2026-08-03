@extends('layouts.kadai')

@section('pageTitle', '記事編集')
@section('title', '記事編集')

@section('content')
    <section>
        <form action="{{ route('articles.update', $article_data->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
                <div class="my-5 px-5 py-2 border-b">
                    <label class="block text-gray-500 text-sm uppercase" for="title">タイトル</label>

                    <input type="text" name="title" id="title"
                        class="w-full text-2xl font-bold leading-10 border border-gray-300 rounded-md"
                        value="{{ old('title', $article_data->title) }}">

                    @error('title')
                        <p class="text-sm text-red-600 my-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex justify-between py-3">
                    <div class="w-4/12 mr-5">
                        <label class="block text-gray-500 text-sm uppercase" for="image">画像ファイル</label>

                        @if ($article_data->img_path)
                            <figure class="flex flex-col mb-5">
                                <img src="{{ asset('storage/kadai_images/' . $article_data->img_path) }}" alt="投稿画像"
                                    class="w-full">
                            </figure>
                        @else
                            <div class="relative w-full h-80 overflow-hidden border border-gray-300 rounded-md">
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="relative z-10 w-full text-xs px-3 py-2 bg-white">
                                <figure id="imagePreviewArea" class="absolute inset-x-3 top-12 bottom-3 hidden">
                                    <img id="imagePreview" src="" alt="画像プレビュー"
                                        class="w-full h-full object-contain object-top rounded-md">
                                </figure>
                            </div>
                            @error('image')
                                <p class="text-sm text-red-600 my-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        @endif
                    </div>

                    <div class="grow">
                        <label class="block text-gray-500 text-sm uppercase" for="body">本文</label>

                        <textarea name="body" id="body"
                            class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none">{{ old('body', $article_data->body) }}</textarea>

                        @error('body')
                            <p class="text-sm text-red-600 my-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('articles.show', $article_data->id) }}"
                    class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>

                <button type="submit"
                    class="block w-20 text-white text-center bg-green-600 hover:bg-green-500 px-3 py-2 rounded-md">更新</button>
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
