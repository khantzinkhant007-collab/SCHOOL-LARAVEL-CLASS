@extends('layouts.kadai')

@section('pageTitle','kadai02_3')
@section('title','Bladeテンプレート')
@section('content')
<section>
    <h3 class="text-3xl font-bold py-5 mb-5 border-b-2 border-black">
        @if($comment)
            変数に値があります
        @else
            変数に値がありません
        @endif
    </h3>
</section>
<section class="p-5">
    @if($comment)
        <h4 class="text-xl font-bold mb-2 text-pink-600">
            {{ $comment }}
        </h4>
    @else
        <h4 class="text-xl font-bold mb-2 text-cyan-600">
            変数に値はありません。
        </h4>
    @endif
</section>

@endsection('content')



