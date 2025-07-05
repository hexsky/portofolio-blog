<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', function () {
    return view('welcome'); }); // Nanti diubah jadi controller
Route::get('/portofolio', [PortfolioController::class, 'indexPublic'])->name('portfolio.public');
Route::get('/blog', [PostController::class, 'indexPublic'])->name('blog.public');
Route::get('/blog/{post:slug}', [PostController::class, 'showPublic'])->name('blog.show');

// Halaman Admin yang dilindungi Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Menggunakan Route Resource untuk CRUD otomatis
    Route::resource('dashboard/portfolios', PortfolioController::class)->except(['show']);
    Route::resource('dashboard/posts', PostController::class)->except(['show']);
});

require __DIR__ . '/auth.php';
