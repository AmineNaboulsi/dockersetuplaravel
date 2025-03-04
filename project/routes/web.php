<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitysController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthValidation;
use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Route;

//View
Route::get('/login', [PageController::class , "login"])->name("login");
Route::get('/register', [PageController::class , "register"])->name("register");
Route::get('/forget-password', [PageController::class , "forgetpassword"])->name("forgetpassword");
Route::get('/', [PageController::class , "home"])->name('home');
Route::get('/posts', [PageController::class , "posts"])->name('posts.index');
Route::get('/posts/book/{id}', [PageController::class , "book"])->name('posts.book');
Route::post('/booking/{id}', [ReservationsController::class , "store"])->name('booking.create');
// Route::get('/post/{id}', [PageController::class , "post"])->name('post');

//Actions
Route::post('/signin', [AuthController::class , "signin"])->name("signin");
Route::post('/logout', [PageController::class , "logout"])->name("logout");

//Route Layer
Route::middleware([AuthValidation::class])->group(function(){
    Route::get('/dashboard', [PageController::class , "dashboard"])->name('dashboard.index');
    Route::get('/dashboard/roles', [PageController::class , "roles"])->name('dashboard.roles');
    Route::post('/dashboard/role/create', [RolesController::class , "store"])->name('roles.create');
    Route::put('/dashboard/role/edit', [RolesController::class , "edit"])->name('roles.edit');
    Route::put('/dashboard/role/delete', [RolesController::class , "destroy"])->name('roles.destroy');
    Route::get('/profile', [PageController::class , "profile"])->name('profile.index');
    Route::get('/profile/favorite', [PageController::class , "favorite"])->name('profile.favorite');
    Route::get('/profile/payment', [PageController::class , "payment"])->name('profile.payment');
    Route::get('/profile/notification', [PageController::class , "notification"])->name('profile.notification');
    Route::get('/profile/change-password', [PageController::class , "password"])->name('profile.password');
    Route::get('/profile/edit', [PageController::class , "editprofile"])->name('profile.edit');
    Route::get('/profile/cancelnavette/{id}', [PageController::class , "cancelnavette"])->name('cancel.navette');
});

//api
Route::post('/signup', [AuthController::class , "signup"])->name("signup");
Route::get('/getcitys', [CitysController::class , "getcitys"])->name("getcitys");
Route::get('/getnavette', [CitysController::class , "getnavette"])->name("getcitys");

Route::fallback(function() {
    return view('404');
});
