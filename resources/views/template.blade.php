<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta name="csrf" content="{{ csrf_token() }}">
</head>
<header class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Meshgroup</strong>
        </a>
        <nav >
            <ul class="navbar-nav bd-navbar-nav flex-row">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Main</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('upload.index') }}">Upload Excel</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Main</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Main</a></li>
            </ul>
        </nav>
    </div>
</header>

<main role="main" id="app">
    <div class="container pt-4">
        @yield('main')
    </div>
</main>

<footer class="text-muted">
    <div class="container">

    </div>
</footer>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
