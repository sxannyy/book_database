@extends('layouts.app')

@section('content')
<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Genres List</title>
            <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        </head>
        <body>
            <h1>Genres List</h1>
            <a href="{{ route('genres.create') }}">Add New Genre</a>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genres as $genre)
                    <tr>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genres.edit', $genre->id) }}">Edit</a> |
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </body>
        </html>
@endsection