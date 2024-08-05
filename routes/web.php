<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name("home");

Route::controller(LoginController::class)->group(function(){
    Route::get("/login", "index")->name("login.index");
    Route::get("/login/create", "create")->name("login.create");
    Route::Post("/login", "store")->name("login.store");
    Route::get("/logout", "destroy")->name("login.destroy");
    Route::get("/login{user}", "show")->name("login.show");
    Route::get("/logout{user}/edit", "edit")->name("login.edit");
    Route::put("/login{user}", "update")->name("login.update");
    Route::delete("/logout", "destroy")->name("login.destroy");
});

// Route::get('/login', [LoginController::class, 'index'])->name('login.index');
// Route::Post('/login', [LoginController::class, "store"])->name("login.store");
// Route::get('/logout', [LoginController::class, "destroy"])->name("login.destroy");
