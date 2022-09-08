<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('books', BooksController::class)->middleware('api');

Route::get('/books/edit/{id}', [BooksController::class, 'edit']);
Route::post('/books/update/{id}', [BooksController::class, 'update']);
Route::post('/books/destroy/{id}', [BooksController::class, 'destroy']);