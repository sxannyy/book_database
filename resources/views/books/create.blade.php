@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <h1>Create New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Book Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="author_id">Authors</label>
            <select name="author_id" id="author_id" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="genre_ids">Genres</label>
            <select name="genre_ids" id="genre_ids" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn">
        </div>

        <div>
            <label for="cost">Cost</label>
            <input type="number" name="cost" id="cost" step="0.01">
        </div>

        <div>
            <label for="year">Year</label>
            <input type="number" name="year" id="year">
        </div>

        <button type="submit">Create Book</button>
    </form>
</body>
</html>
@endsection