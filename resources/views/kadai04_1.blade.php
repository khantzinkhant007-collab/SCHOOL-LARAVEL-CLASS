@extends('layouts.kadai')

@section('pageTitle', 'kadai04_1')
@section('title', 'お問い合わせ入力')
@section('content')
        <section>
        <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">お問い合わせフォーム</h3>
        <form action="{{ route('kadai04.post') }}" method="POST">
    @csrf

    <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">

        <div class="flex flex-col w-full lg:w-6/12 mr-5">

            <!-- 種別 -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">種別</label>
                <select name="type" class="w-full h-10 px-3 border-2 border-gray-200 rounded-md">
                    <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>質問</option>
                    <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>要望</option>
                    <option value="3" {{ old('type') == '3' ? 'selected' : '' }}>その他</option>
                </select>
            </div>

            <!-- 氏名 -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">氏名<em class="text-pink-600">※</em></label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full h-10 px-3 border-2 border-gray-200 rounded-md">
                @error('name')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- メール -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">メールアドレス<em class="text-pink-600">※</em></label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="w-full h-10 px-3 border-2 border-gray-200 rounded-md">
                @error('email')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="flex flex-col flex-grow">

            <!-- 件名 -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">件名</label>
                <input type="text" name="subject" value="{{ old('subject') }}"
                    class="w-full h-10 px-3 border-2 border-gray-200 rounded-md">
            </div>

            <!-- 内容 -->
            <div class="flex flex-col flex-grow">
                <label class="text-gray-400 text-sm">内容<em class="text-pink-600">※</em></label>
                <textarea name="content"
                    class="w-full h-40 border-2 border-gray-200 rounded-md">{{ old('content') }}</textarea>

                @error('content')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="text-white bg-pink-600 px-10 hover:bg-pink-500 rounded-md">
            確認
        </button>
    </div>
</form>

    </section>

@endsection
