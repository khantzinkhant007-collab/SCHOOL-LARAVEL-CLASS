@extends('layouts.kadai')

@section('pageTitle', 'kadai04_3')

@section('title', 'お問い合わせ完了')

@section('content')

<section>
    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">
        お問い合わせ完了
    </h3>

    <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">
        <p>お問い合わせが完了しました。</p>
    </div>

    <div class="mb-10">
        <p>名前：{{ $data['name'] ?? '' }}</p>
        <p>メール：{{ $data['email'] ?? '' }}</p>
        <p>件名：{{ $data['subject'] ?? '' }}</p>
        <p>内容：{{ $data['content'] ?? '' }}</p>
    </div>

    <div class="flex justify-end">
        <a href="{{ route('kadai04.index') }}"
           class="text-white text-center leading-10 bg-gray-600 px-10 hover:bg-pink-500 rounded-md">
           入力画面へ戻る
        </a>
    </div>
</section>

@endsection
