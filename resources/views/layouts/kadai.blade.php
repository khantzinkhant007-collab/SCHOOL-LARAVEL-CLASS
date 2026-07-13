<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle') - サーバーサイドスクリプト演習 2</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper w-screen bg-gray-50">
        <header class="bg-sky-400">
            <div class="container mx-auto py-5">
                <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習 2</h1>
                <h2 class="text-white text-3xl">@yield('title')</h2>
            </div>
        </header>
        <main>
            <div class="container w-full mx-auto py-10">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
