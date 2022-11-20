<?php

use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\User\Create;
use App\Http\Livewire\Admin\User\Edit;
use App\Http\Livewire\Admin\User\Index;
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


Auth::routes();
Route::get('/',function (){
   return view('welcome');
});
Route::get('/home',function (){
    return view('home');
});
Route::group(['prefix' => '/admin', 'as' => 'admin.',], function () {
    Route::get('/home',Home::class)->name('home');
    Route::group(['prefix' => '/users', 'as' => 'users.',], function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create',Create::class)->name('create');
        Route::get('/edit/{user}',Edit::class)->name('edit');
    });

});


