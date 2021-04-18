<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('pageTitle')</title>
</head>
<body>

    <header>
        <nav>
            @include('blocks.menu')                
        </nav>
    </header>

    <main>
        <h2>{{ $pageTitle }}</h2>
        @yield('content')
    </main>

    <footer>
        @include('blocks.footer')
    </footer>
    
</body>
</html>
