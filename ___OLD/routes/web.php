<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile/tasks', [App\Http\Controllers\HomeController::class, 'index'])->name('/profile/tasks');
    Route::get('/profile/tasks/items/create', [App\Http\Controllers\HomeController::class, 'index'])->name('/profile/tasks');
    Route::get('/profile/tasks/edit/{id}', [App\Http\Controllers\HomeController::class, 'index'])->name('/profile/tasks');
Route::get('/profile/edit', [App\Http\Controllers\HomeController::class, 'profileEdit'])->name('/profile/edit');

use App\Http\Controllers\ItemController;
Route::get('/profile/tasks/items', [ ItemController::class, 'index' ]);
Route::post('/profile/tasks/items', [ ItemController::class, 'store' ]);
Route::delete('/profile/tasks/items/{id}/', [ ItemController::class, 'destroy' ]);
Route::get('/profile/tasks/items/{id}/edit', [ ItemController::class, 'edit' ]);
Route::patch('/profile/tasks/items/{id}', [ ItemController::class, 'update' ]);

