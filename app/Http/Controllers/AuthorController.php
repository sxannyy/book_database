<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string'
        ]);

        $author = Author::create($validated);
        return redirect()->route('authors.index')->with('success', 'Author created successfully!');
    }

    public function show(Author $author)
    {
        return response()->json($author->load('books'), 200);
    }

    public function edit(Author $author)
    {
        return view("authors.edit", compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'bio' => 'nullable|string'
        ]);

        $author->update($validated);
        return redirect()->route('authors.index')->with('success', 'Author updated successfully!');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully!');
    }
}