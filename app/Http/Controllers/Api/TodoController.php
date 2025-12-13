<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected TodoService $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    // GET All Todos
    public function index()
    {
        return response()->json(
            $this->todoService->getAll()
        );
    }

    // Create Todos
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
        ]);

        $todo = $this->todoService->create($validated);

        return response()->json($todo, 201);
    }

    // GET single todo
    public function show(int $id)
    {
        $todo = $this->todoService->getById($id);

        return response()->json($todo, 200);
    }

    // Update a Todo
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $todo = $this->todoService->update($id, $validated);

        return response()->json($todo, 200);
    }

    // DELETE a Todo
    public function destroy(int $id)
    {
        $this->todoService->delete($id);

        return response()->json([
            'message' => 'Todo deleted successfully'
        ], 200);
    }
}
