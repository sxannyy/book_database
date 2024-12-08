<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Books Catalogue') }}</title>
    <link rel="stylesheet" href="{{ asset('css/custom_container.css') }}">
</head>
<body>
    <div class="page-container">
        <header>
            <nav>
                <a href="{{ route('books.index') }}">Books</a>
                <a href="{{ route('authors.index') }}">Authors</a>
                <a href="{{ route('genres.index') }}">Genres</a>
            </nav>
        </header>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Books Catalogue 2024</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
