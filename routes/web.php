<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\ProjectController as GuestProjectController;
use App\Http\Controllers\Home\PageController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PageController::class, 'home'])->name('homepage');

Route::resource('projects', GuestProjectController::class)->parameters(['projects' => 'project:slug']);



Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function() {

    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
    
    Route::get('/', [HomePageController::class, 'home'])->name('homepage');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
