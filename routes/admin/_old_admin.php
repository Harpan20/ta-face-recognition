<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MisiController;
use App\Http\Controllers\admin\VisiController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'login'])->name('admin.login');
Route::post('login', [LoginController::class, 'proseslogin'])->name('admin.proses');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::controller(VisiController::class)->group(function () {
        Route::get('/admin/visi', 'index')->name('admin.visi.index');
        Route::get('/admin/visi/create', 'create')->name('admin.visi.create');
        Route::post('/admin/visi', 'store')->name('admin.visi.store');
        Route::get('/admin/visi/{visi}/edit', 'edit')->name('admin.visi.edit');
        Route::put('/admin/visi/{visi}', 'update')->name('admin.visi.update');
        // Route::get('/admin/visi/{visi}', 'show')->name('admin.visi.show');
        Route::delete('/admin/visi/{visi}', 'destroy')->name('admin.visi.destroy');
        Route::get('/admin/visi/search', 'search')->name('admin.visi.search');
    });

    Route::controller(MisiController::class)->group(function () {
        Route::get('/admin/misi', 'index')->name('admin.misi.index');
        Route::get('/admin/misi/create', 'create')->name('admin.misi.create');
        Route::post('/admin/misi', 'store')->name('admin.misi.store');
        Route::get('/admin/misi/{misi}/edit', 'edit')->name('admin.misi.edit');
        Route::put('/admin/misi/{misi}', 'update')->name('admin.misi.update');
        // Route::get('/admin/misi/{misi}', 'show')->name('admin.misi.show');
        Route::delete('/admin/misi/{misi}', 'destroy')->name('admin.misi.destroy');
        Route::get('/admin/misi/search', 'search')->name('admin.misi.search');
    });
});
