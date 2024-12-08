@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Book Name</label>
            <input type="text" name="name" id="name" value="{{ $book->name }}" required>
        </div>

        <div>
            <label for="author_id">Author</label>
            <select name="author_id" id="author_id" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="genre_ids">Genres</label>
            <select name="genre_ids[]" id="genre_ids" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ in_array($genre->id, $book->genres->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{ $book->isbn }}">
        </div>

        <div>
            <label for="cost">Cost</label>
            <input type="number" name="cost" id="cost" step="0.01" value="{{ $book->cost }}">
        </div>

        <div>
            <label for="year">Year</label>
            <input type="number" name="year" id="year" value="{{ $book->year }}">
        </div>

        <button type="submit">Update Book</button>
    </form>
</body>
</html>
@endsection