<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TodoService;

class TodoController extends Controller
{
    protected TodoService $todoService;
}
