<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite([
        'resources/sass/app.scss',
        'resources/js/app.ts'
    ])
</head>

<body>
    <div id="app">
        <main class="main">
            @yield('content')
        </main>
    </div>
</body>
</html>