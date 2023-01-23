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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','can:admin']], function () {
    Route::get('/user/index', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::post('/user/update/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::get('/items/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/items/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/items/index2', [App\Http\Controllers\ItemController::class, 'index2']);
    Route::get('/items/edit2/{id}', [App\Http\Controllers\ItemController::class, 'edit2'])->name('items.edit2');
    Route::post('/items/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
    Route::post('/items/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');
   });



Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/detail/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::get('/search', [App\Http\Controllers\SearchController::class, 'index']);                  
    Route::get('/search/detail/{id}', [App\Http\Controllers\SearchController::class, 'detail']);   
    
    Route::get('/abc', [App\Http\Controllers\ItemController::class, 'abc']);
    


});
