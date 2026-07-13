@extends('layouts.kadai')

@section('pageTitle','kadai02_4')
@section('title','Bladeテンプレート')

@section('content')

<section class="p-5">

    @foreach($data as $item)
        <div class="mb-5 border-b pb-3">
            <h4 class="text-xl font-bold">{{ $item['name'] }}</h4>
            <p>{{ $item['comment'] }}</p>
        </div>
    @endforeach

</section>

@endsection
