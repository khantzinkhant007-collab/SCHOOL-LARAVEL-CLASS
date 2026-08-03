@extends('layouts.kadai')

@section('pageTitle', 'Sample02_3')
@section('title', 'Sample02 Blade Template')

@section('content')
    <div>
        <h3 class="text-3xl font-bold py-5 mb-5 border-b-2 border-black">
            ページビューで指定のh3タグ
        </h3>
        <div class="p-5">
            <h4 class="text-xl font-bold text-pink-600 mb-2">
                ページビューで指定のh4タグ
            </h4>
        </div>
    </div>
@endsection
