<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AuthController;

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
Route::get('/', [QuestionsController::class, 'index'])->name('home');
Route::get('/questions', [QuestionsController::class, 'index'])->name('questions.index');

// Protected Question Routes
Route::middleware('auth')->group(function () {
    Route::get('/questions/create', [QuestionsController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionsController::class, 'store'])->name('questions.store');
    Route::get('/questions/my', [QuestionsController::class, 'userQuestions'])->name('questions.my');
});
