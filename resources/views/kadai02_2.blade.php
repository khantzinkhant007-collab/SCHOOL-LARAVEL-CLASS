@extends('layouts.kadai')

@section('pageTitle','kadai02_2')
@section('title','Bladeテンプレート')
@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>コントローラーからビューの呼び出し</h2>
    {{ $message }}

</body>
</html>

@endsection
