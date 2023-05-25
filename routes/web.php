<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;


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

Route::get('layouts/dashboard', function () {
    return view('layouts.dashboard');
})->name('layouts.dashboard');

Route::get('layouts/table', function () {
    return view('layouts.table');
})->name('layouts.table');

Route::get('layouts/add', function () {
    return view('layouts.add');
})->name('layouts.add');

Route::get('layouts/profile', function () {
    return view('layouts.profile');
})->name('layouts.profile');

Route::get('layouts/image', function () {
    return view('layouts.image');
})->name('layouts.image');


Auth::routes();

Route::get('/alumni/export', 'App\Http\Livewire\DashWire@export')->name('alumni.export');


Route::post('/alumni/store', 'AlumniController@store')->name('alumni.store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
