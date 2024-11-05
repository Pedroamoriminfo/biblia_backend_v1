<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/v1')->group(function () {
    Route::prefix('/books')->group(function () {
        Route::get('/', [BookController::class, 'getAll']);
        Route::get('/{id}', [BookController::class, 'getById']);
        Route::get('/{id}/chapter/{chapter}', [BookController::class, 'getByChapter']);
        Route::get('/{id}/chapter/{chapter}/verse/{verse}', [BookController::class, 'getByVerse']);
    });
    Route::prefix('/chapters')->group(function () {
        Route::get('/', [BookController::class, 'getAll']);
    });
    Route::prefix('/verses')->group(function () {
        Route::get('/', [BookController::class, 'getAll']);
    });


    route::fallback(function () {
        $array['status'] = false;
        $array['error'] = 'Endpoint inválido';
        return $array;
    });
});
