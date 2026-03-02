<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $books = Books::all();

        return response()->json($books, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'release_date' => 'required|date'
    ]);

    $book = Books::create($validated);

    return response()->json($book, 201);

    }

    /**
     * Display the specified resource.
     */
        public function show(Books $book)
        {
            return response()->json($book, 200);
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $book)
    {
         $validated = $request->validate([
        'title' => 'sometimes|required|string|max:255',
        'author' => 'sometimes|required|string|max:255',
        'release_date' => 'sometimes|required|date'
    ]);

    $book->update($validated);

    return response()->json([
        'message' => 'Book updated successfully',
        'data' => $book
    ],  200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        $book->delete();

    return response()->json([
        'message' => 'Book deleted successfully'
    ], 200);
    }
}
