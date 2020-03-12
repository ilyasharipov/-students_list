<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <a href="{{ route('pages.welcome') }}">Главная</a>
        <a href="{{ route('students.index') }}">Список студентов</a>
        <a href="{{ route('students.create') }}">Добавить студента</a>
        <a href="{{ route('groups.index') }}">Список групп</a>
        <a href="{{ route('groups.create') }}">Добавить группу</a>
        <div class="container mt-4">
            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>