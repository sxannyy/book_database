@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Genre</title>
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    </head>
    <body>
        <h1>Edit Genre</h1>
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Genre Name</label>
                <input type="text" name="name" id="name" value="{{ $genre->name }}" required>
            </div>

            <button type="submit">Update Genre</button>
        </form>
    </body>
    </html>
@endsection