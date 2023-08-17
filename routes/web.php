<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ClientController;

use App\Http\Controllers\ProfileController;
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

Route::get('/', [ClientController::class, 'index']);
Route::get('/Cart', [CartController::class, 'index'])->name('cartIndex');

Route::prefix('/admin')->group(function() {
    Route::get('/dashboard', function () {
        return view('Layouts.Admin.Pages.dashboard');
    })->name('dashboard');


    Route::prefix('user')->group(function (){
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::get('/{id}', [UserController::class, 'show'])->name('admin.user.show');
        Route::put('/{id}', [UserController::class, 'update'])->name('admin.user.update');
    });

    Route::prefix('role')->group(function (){
        Route::get('/', [RoleController::class, 'index'])->name('admin.role');
        Route::post('/', [RoleController::class, 'store'])->name('admin.role');
        Route::get('/{id}', [RoleController::class, 'show'])->name('admin.role.show');
        Route::put('/{id}', [RoleController::class, 'update'])->name('admin.role.update');
    });

    Route::prefix('permission')->group(function (){
        Route::get('/', [PermissionController::class, 'index'])->name('admin.permission');
        Route::post('/', [PermissionController::class, 'store'])->name('admin.permission');
        Route::get('/{id}', [PermissionController::class, 'show'])->name('admin.permission.show');
        // Route::put('/{id}', [UserController::class, 'update'])->name('admin.user.update');
    });
  

})->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
