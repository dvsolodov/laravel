<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle }}</title>
</head>
<body>
    <main>
        <h2>{{ $pageTitle }}</h2>
        @yield('content')
    </main>

    <footer>
        @include('blocks.footer')
    </footer>
    
</body>
</html>
