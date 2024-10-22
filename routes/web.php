<?php

use App\Livewire\AppIndexComponent;
use App\Livewire\AppStoreComponent;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show-user', AppIndexComponent::class)->name('show-user');
Route::get('/store', AppIndexComponent::class)->name('store');
