<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<main>
    @yield('content')
</main>

<footer>
    <p>© 2025 Все права защищены</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
