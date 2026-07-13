@extends('layouts.kadai')

@section('pageTitle', 'Sample06')
@section('title', 'SAMPL06')

@section('content')
    <section>
        <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
            <h3 class="text-2xl font-bold leading-10 my-5 px-5 py-2 border-b">{{ $sample_data->title }}</h3>
            <p class="text-gray-400 text-sm text-right px-3">
                <time datetime="">{{ $sample_data->created_at }}</time>
            </p>

            @php
                $imagePath = $sample_data->img_path
                    ? (\Illuminate\Support\Str::startsWith($sample_data->img_path, 'storage/')
                        ? $sample_data->img_path
                        : 'storage/images/' . $sample_data->img_path)
                    : null;
            @endphp

            <div class="flex justify-between py-3">
                <figure class="flex flex-col w-4/12 min-h-80 bg-white overflow-hidden">
                    @if ($imagePath)
                        <img src="{{ asset($imagePath) }}" alt="投稿画像"
                            class="w-full h-full object-cover object-top">
                    @else
                        <img src="{{ asset("storage/images/sample.png") }}" alt="投稿画像"
                            class="w-full h-full object-cover object-top">
                    @endif
                </figure>
                <p class="grow w-8/12 text-lg leading-loose px-3 py-5">{{ $sample_data->body }}</p>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('sample06.index') }}"
                class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>

            <form action="{{ route('sample06.destroy', $sample_data->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="block w-16 text-white text-center bg-red-600 hover:bg-red-500 mr-5 px-3 py-2 rounded-md">削除</button>
            </form>
            <a href="{{ route('sample06.edit', $sample_data->id) }}"
                class="block w-20 text-white text-center bg-pink-600 hover:bg-pink-500 px-3 py-2 rounded-md">編集</a>
        </div>
    </section>
@endsection
