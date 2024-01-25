<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();

        return response()->json($todos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'todo' => 'required|string|max:255',
        ]);

        $todo = Todo::create($validated);

        return response()->json($todo, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return response()->json($todo, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'todo' => 'nullable|string|max:255',
            'done' => 'nullable|boolean',
        ]);

        $todo->todo = $validated["todo"] ?? $todo->todo;
        $todo->done = $validated["done"] ?? $todo->done;

        $todo->save();

        return response()->json($todo, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->noContent();
    }
}
