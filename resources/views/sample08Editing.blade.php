@extends('layouts.kadai')

@section('pageTitle', 'Sample06')
@section('title', 'SAMPL06')

@section('content')
    <section>
        <form action="{{ route('sample06.update', $sample_data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
                <div class="my-5 px-5 py-2 border-b">
                    <label class="block text-gray-500 text-sm uppercase" for="title">title</label>
                    <input type="text" name="title" id="title"
                        class="w-full text-2xl font-bold leading-10 border border-gray-300 rounded-md"
                        value="{{ old('title', $sample_data->title) }}">
                    @error('title')
                        <p class="text-sm text-red-600 my-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex justify-between py-3">
                    <div class="w-4/12 mr-5">
                        <label class="block text-gray-500 text-sm uppercase" for="image">image file</label>
                        @if ($sample_data->img_path)
                            @php
                                $imagePath = \Illuminate\Support\Str::startsWith($sample_data->img_path, 'storage/')
                                    ? $sample_data->img_path
                                    : 'storage/images/' . $sample_data->img_path;
                            @endphp
                            <img src="{{ asset($imagePath) }}" alt="投稿画像" class="w-full mb-5">
                        @else
                            <input type="file" name="image" id="image" accept="image/*"
                                class="w-full h-20 text-xs px-3 py-2 border border-gray-300 rounded-md">
                            @error('image')
                                <p class="text-sm text-red-600 my-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        @endif
                    </div>
                    <div class="grow">
                        <label class="block text-gray-500 text-sm uppercase" for="body">body</label>
                        <textarea name="body" id="body"
                            class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none">{{ old('body', $sample_data->body) }}</textarea>
                        @error('body')
                            <p class="text-sm text-red-600 my-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('sample06.show', $sample_data->id) }}"
                    class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
                <button type="submit"
                    class="block w-20 text-white text-center bg-sky-600 hover:bg-sky-500 px-3 py-2 rounded-md">更新</button>
            </div>
        </form>
    </section>
@endsection
