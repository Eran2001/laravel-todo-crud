<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('todos', TodoController::class);

Route::post("register", [AuthController::class, "registerUser"]);
Route::post("login", [AuthController::class, "loginUser"]);
