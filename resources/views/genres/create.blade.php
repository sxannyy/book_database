@extends('layouts.app')
@section('content')

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Genre</title>
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    </head>
    <body>
        <h1>Create New Genre</h1>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Genre Name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <button type="submit">Create Genre</button>
        </form>
    </body>
    </html>
@endsection