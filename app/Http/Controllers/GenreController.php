<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function create()
    {
        return view('genres.create');
    }

    public function index()
    {
        $genres = Genre::get();
        return view('genres.index', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres',
            'description' => 'nullable|string'
        ]);

        $genre = Genre::create($validated);
        // return response()->json($genre, 201);
        return redirect()->route('genres.index')->with('success', 'Genre created successfully!');
    }

    public function show(Genre $genre)
    {
        return response()->json($genre->load('books'), 200);
    }

    public function edit(Genre $genre)
    {
        return view("genres.edit", compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'string|max:255|unique:genres,name,' . $genre->id,
            'description' => 'nullable|string'
        ]);

        $genre->update($validated);
        return redirect()->route('genres.index')->with('success', 'Genre edited successfully!');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully!');
    }
}