@extends('layouts.kadai')

@section('pageTitle','Sample04')
@section('title','Bladeテンプレート')

@section('content')
<form action="Sample04" method="POST">
    @csrf
    <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">
        <div class="flex flex-col w-full lg:w-6/12 mr-5">
            <!-- ▼▼氏名▼▼ -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">氏名</label>
                <input type="text" name="name" value=""
                    class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                    @error('name')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
            </div>
            <!-- ▲▲氏名▲▲ -->
            <!-- ▼▼メールアドレス▼▼ -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">メールアドレス</label>
                <input type="text" name="email" value=""
                    class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                    @error('email')
                    <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
            </div>
            <!-- ▲▲メールアドレス▲▲ -->
        </div>
    </div>
    <div class="flex justify-end">
        <button type="submit"
            class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">確認</button>
    </div>
</form>
</section>
@endsection
