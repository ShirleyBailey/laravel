<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::delete('/delete/{id}', [TaskController::class, 'delete']); 
Route::post('/create', [TaskController::class, 'create']);
Route::get('/read', [TaskController::class, 'read']);
Route::get('/read_one/{id}', [TaskController::class, 'read_one']);
Route::put('/update/{id}', [TaskController::class, 'update']);

