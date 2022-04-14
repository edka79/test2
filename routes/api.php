<?php

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


// use App\Http\Controllers\ItemController;
// Route::get('/profile/tasks/items', [ ItemController::class, 'index' ]);
// Route::delete('/profile/tasks/items/{id}/', [ ItemController::class, 'destroy' ]);
// Route::get('/profile/tasks/items/{id}/edit', [ ItemController::class, 'edit' ]);
// Route::patch('/profile/tasks/items/{id}', [ ItemController::class, 'update' ]);
// Route::post('/profile/tasks/items', [ ItemController::class, 'store' ]);

// use App\Http\Controllers\ProfileController;
// Route::get('/profile/userinfo', [App\Http\Controllers\ProfileController::class, 'userinfo'])->name('/profile/userinfo');