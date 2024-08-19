<?php

use App\Http\Controllers\FurnitureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/fetch-furniture', [FurnitureController::class, 'fetchFurniture']);
Route::get('/fetch-posts', [PostsController::class, 'fetchPosts']);
Route::get('/fetch-recipes', [RecipesController::class, 'fetchRecipes']);
Route::get('/fetch-users', [UserController::class, 'fetchUsers']);

