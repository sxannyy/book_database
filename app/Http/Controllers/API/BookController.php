<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genres'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.create', compact('genres', 'authors'));
    }
    public function show(Book $book)
    {
        $book->load(['author', 'genres']);
        return new BookResource($book);
    }

    public function edit(Book $book)
    {
        $book->load(['author', 'genres']);
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres', 'authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'nullable|string|max:255',
            'cost' => 'nullable|numeric',
            'year' => 'nullable|integer',
            'genre_ids' => 'required|exists:genres,id'
        ]);

        $book = Book::create($validated);
        if (isset($validated['genre_ids'])) {
            $book->genres()->sync($validated['genre_ids']);
        }
        $new_book_resource = new BookResource($book->load(['author', 'genres']));
        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'nullable|string|max:255',
            'cost' => 'nullable|numeric',
            'year' => 'nullable|integer',
            'genre_ids' => 'array',
            'genre_ids.*' => 'exists:genres,id',
        ]);

        $book->update($validated);
        if (isset($validated['genre_ids'])) {
            $book->genres()->sync($validated['genre_ids']);
        }

        $new_book_resource = new BookResource($book->load(['author', 'genres']));
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}