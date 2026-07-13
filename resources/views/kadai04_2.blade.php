@extends('layouts.kadai')

@section('pageTitle', 'kadai04_2')

@section('title', 'お問い合わせ確認画面')

@section('content')
<section>
    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">
        お問い合わせ確認画面
    </h3>

    <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">

        <div class="flex flex-col w-full lg:w-6/12 mr-5">

            <!-- 種別 -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">種別</label>
                <p class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md">
                    {{ $input['type'] == 1 ? '質問' : ($input['type'] == 2 ? '要望' : 'その他') }}
                </p>
            </div>

            <!-- 氏名 -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">氏名</label>
                <p class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md">
                    {{ $input['name'] }}
                </p>
            </div>

            <!-- メール -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">メールアドレス</label>
                <p class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md">
                    {{ $input['email'] }}
                </p>
            </div>

        </div>

        <div class="flex flex-col flex-grow">

            <!-- 件名 -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">件名</label>
                <p class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md">
                    {{ $input['subject'] ?? '' }}
                </p>
            </div>

            <!-- 内容 -->
            <div class="flex flex-col flex-grow">
                <label class="text-gray-400 text-sm">内容</label>
                <div class="w-full h-40 text-lg px-2 py-2 border-2 border-gray-200 rounded-md">
                    {!! nl2br(e($input['content'])) !!}
                </div>
            </div>

        </div>
    </div>


    <div class="flex justify-end">
        <form action="{{ route('kadai04.back') }}" method="POST">
            @csrf
            <button type="submit"
                class="text-white text-center leading-10 bg-gray-500 px-10 mr-10 hover:bg-gray-400 rounded-md">
                戻る
            </button>
        </form>

        <form action="{{ route('kadai04.complete') }}" method="POST">
            @csrf
            <button type="submit"
                class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">
                送信
            </button>
        </form>
    </div>

</section>
@endsection
