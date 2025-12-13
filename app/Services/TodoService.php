<?php

namespace App\Services;

use App\Models\Todo;

class TodoService
{
    public function getAll()
    {
        return Todo::all();
    }

    public function getById(int $id)
    {
        return Todo::findOrFail($id);
    }

    public function create(array $data)
    {
        return Todo::create($data);
    }

    public function update(int $id, array $data)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($data);
        return $todo;
    }

    public function delete(int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return true;
    }
}
