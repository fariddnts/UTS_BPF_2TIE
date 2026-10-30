<?php

use App\Http\Controllers\Biodata1065Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;

Route::resource('portofolio', PortofolioController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('question/respon', [QuestionController::class, 'respon'])
    ->name('question.respon');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('pelanggan', PelangganController::class);

// Resource Route untuk Biodata_1065 (NIM 1065)
Route::resource('biodata1065', Biodata1065Controller::class);
