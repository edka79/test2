<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;

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


Route::middleware('auth:api')->group(function () {
    Route::get('/profile/userinfo', [ ProfileController::class, 'userinfo' ])->name('/profile/userinfo');
    Route::get('/profile/tasks/items', [ ItemController::class, 'index' ]);
    Route::get('/profile/tasks/items/{id}/edit', [ ItemController::class, 'edit' ]);
    Route::patch('/profile/tasks/items/{id}', [ ItemController::class, 'update' ]);
    Route::post('/profile/tasks/items', [ ItemController::class, 'store' ]);
    Route::delete('/profile/tasks/items/{id}/', [ ItemController::class, 'destroy' ]);
    
    Route::get('/profile/edit', [ ProfileController::class, 'index' ])->name('/profile/edit');
    Route::get('/profile/edit/fields', [ ProfileController::class, 'fields' ])->name('/profile/edit/fields');    
    Route::patch('/profile/update/fields', [ ProfileController::class, 'update' ])->name('/profile/update/fields');
    
    Route::patch('/profile/avatar', [ ProfileController::class, 'avatar'])->name('/profile/avatar');
    Route::post('/upload', [ FileController::class, 'upload' ])->name('upload');
});
