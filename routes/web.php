<?php

use App\Http\Livewire\User\Create;
use App\Http\Livewire\User\Edit;
use App\Http\Livewire\User\Index;
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
Route::get('/home', Index::class)->name('users');
Route::get('/create',Create::class)->name('users.create');
Route::get('/edit/{user}',Edit::class)->name('users.edit');

