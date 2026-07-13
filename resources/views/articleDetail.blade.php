@extends('layouts.kadai')

@section('pageTitle', 'articleDetail')
@section('title', '記事詳細')

@section('content')
    <section>
        <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
            <h3 class="text-2xl font-bold leading-10 my-5 px-5 py-2 border-b">
                {{ $article->title }}
            </h3>

            <p class="text-gray-400 text-sm text-right px-3">
                <time datetime="">{{ $article->created_at }}</time>
            </p>

            <div class="flex justify-between py-3">
                <figure class="flex flex-col w-4/12 min-h-80 bg-white overflow-hidden">
                    @if ($article->img_path)
                        <img src="{{ asset('storage/kadai_images/' . $article->img_path) }}" alt="投稿画像"
                            class="w-full h-full object-cover object-top">
                    @else
                        <img src="{{ asset("storage/images/sample.png") }}" alt="投稿画像"
                            class="w-full h-full object-cover object-top">
                    @endif
                </figure>

                <p class="grow w-8/12 text-lg leading-loose px-3 py-5">
                    {!! nl2br(htmlspecialchars($article->body, ENT_QUOTES, 'UTF-8')) !!}
                </p>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('articles.index') }}"
                class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>

            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="block w-16 text-white text-center bg-red-600 hover:bg-red-500 mr-5 px-3 py-2 rounded-md">削除</button>
            </form>

            <a href="{{ route('articles.edit', $article->id) }}"
                class="block w-20 text-white text-center bg-pink-600 hover:bg-pink-500 px-3 py-2 rounded-md">編集</a>
        </div>
    </section>
@endsection
