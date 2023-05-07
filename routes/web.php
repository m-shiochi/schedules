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

use App\Http\Controllers\Admin\ScheduleController;
Route::controller(ScheduleController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() 
{
    Route::get('schedule/create', 'add')->name('schedule.add');
    Route::post('schedule/create', 'create')->name('schedule.create');
    Route::get('schedule', 'index')->name('schedule.index');
    Route::get('schedule/edit', 'edit')->name('schedule.edit');
    Route::post('schedule/edit', 'update')->name('schedule.update');
    Route::get('schedule/delete', 'delete')->name('schedule.delete');
});

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() 
{
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile', 'index')->name('profile.index');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

use App\Http\Controllers\TopController as PublicTopController;
Route::get('/', [PublicTopController::class, 'index']);
