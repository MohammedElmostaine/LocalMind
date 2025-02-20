<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Logout Route
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Question Routes
Route::prefix('questions')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/search', [QuestionController::class, 'search'])->name('questions.search');
    
    // Protected Question Routes
    Route::middleware('auth')->group(function () {
        Route::get('/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::put('/{question}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    });
    
    // Public Question Route
    Route::get('/{question}', [QuestionController::class, 'show'])->name('questions.show');
});

// Answer Routes (All Protected)
Route::middleware('auth')->prefix('answers')->group(function () {
    Route::post('/{question}', [AnswerController::class, 'store'])->name('answers.store');
    Route::put('/{answer}', [AnswerController::class, 'update'])->name('answers.update');
    Route::delete('/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');
});

// Profile Routes (All Protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/questions', [ProfileController::class, 'questions'])->name('profile.questions');
    Route::get('/profile/answers', [ProfileController::class, 'answers'])->name('profile.answers');
});

// Favorites Routes (All Protected)
Route::middleware('auth')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/favorites/{question}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{question}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
});

// Location Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::post('/location/update', [ProfileController::class, 'updateLocation'])->name('location.update');
});

// Statistics Route (Public)
Route::get('/statistics', [HomeController::class, 'statistics'])->name('statistics');