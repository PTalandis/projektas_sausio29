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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('articleimages')->group(function() {

    Route::get('', 'App\Http\Controllers\ArticleImageController@index')->name('articleimage.index');
    Route::get('create', 'App\Http\Controllers\ArticleImageController@create')->name('articleimage.create');
    Route::post('store', 'App\Http\Controllers\ArticleImageController@store' )->name('articleimage.store');
    Route::get('edit/{articleImage}', 'App\Http\Controllers\ArticleImageController@edit')->name('articleimage.edit');
    Route::post('update/{articleImage}', 'App\Http\Controllers\ArticleImageController@update')->name('articleimage.update');
    //Route::post('destroy/{client}', 'App\Http\Controllers\ClientController@destroy' )->name('client.destroy');
    //Route::get('show/{client}', 'App\Http\Controllers\ClientController@show')->name('client.show');

});
