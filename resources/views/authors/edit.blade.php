@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <h1>Edit Author</h1>
    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Author Name</label>
            <input type="text" name="name" id="name" value="{{ $author->name }}" required>
        </div>

        <div>
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio">{{ $author->bio }}</textarea>
        </div>

        <button type="submit">Update Author</button>
    </form>
</body>
</html>
@endsection