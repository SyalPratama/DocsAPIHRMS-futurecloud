<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApiDocumentationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/docs/api', [ApiDocumentationController::class, 'index'])->name('api.docs');
    Route::post('/api-documentation/test', [ApiDocumentationController::class, 'testEndpoint'])->name('api.test');

});

