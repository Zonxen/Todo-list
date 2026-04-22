<?php

use App\Models\Post;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::view('/intidaya', 'intidayamandiri');

// Public: hanya boleh lihat detail post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Auth: create, store, edit, update, destroy butuh login
Route::resource('posts', PostController::class)
    ->except(['index', 'show'])
    ->middleware('auth');

Route::get('dashboard', function () {
    $posts = auth()->user()->posts()->latest()->get();
    return view('dashboard', compact('posts'));
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
