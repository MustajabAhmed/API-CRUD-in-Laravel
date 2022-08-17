<?php

use App\Http\Controllers\StudentController;
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

Route::post('/store', [StudentController::class, 'store']);
// Route::get('/show', [StudentController::class, 'show']);
Route::get('/show/{id}', [StudentController::class, 'show']);
Route::put('/update/{id}', [StudentController::class, 'update']);
Route::delete('/delete/{id}', [StudentController::class, 'delete']);