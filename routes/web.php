<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Registration Routes
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Login Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile.edit');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// Public Routes
Route::get('/', [QuestionController::class, 'index'])->name('home');
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

// Search Route
Route::get('/search', [QuestionController::class, 'search'])->name('questions.search');

// Protected Question Routes
Route::middleware('auth')->group(function () {
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/my', [QuestionController::class, 'userQuestions'])->name('questions.my');
    Route::post('/questions/{question}/like', [QuestionController::class, 'like'])->name('questions.like');
});
// Protected Comment Routes
Route::middleware('auth')->group(function () {
    Route::post('/questions/{question}/comments', [CommentController::class, 'store'])->name('comments.store');
});
