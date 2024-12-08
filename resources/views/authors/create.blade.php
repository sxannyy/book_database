@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Author</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <h1>Create New Author</h1>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Author Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio"></textarea>
        </div>

        <button type="submit">Create Author</button>
    </form>
</body>
</html>
@endsection
