<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ImageController;
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
Route::get('/', function () {
    return view('welcome');
});
 Route::resource('/projects', ProjectController::class);
 Route::get('/projects/{id}/images', [ImageController::class, 'index'])->name('projects.images');
 Route::get('/projects/{id}/show/images', [ImageController::class, 'showImages'])->name('projects.view');
 Route::post('/images', [ImageController::class, 'store'])->name('images.store');
 Route::delete('products/images/destroy/{id}', [ImageController::class, 'destroyImage'])->name('projects.images.destroy');
