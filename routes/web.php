<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name("home");

// Route::controller(LoginController::class)->group(function(){
//     Route::get("/login", "index")->name("login.index");
//     // Route::get("/login/create", "create")->name("login.create");
//     Route::Post("/login", "store")->name("login.store");
//     Route::get("/login/{user}", "show")->name("login.show");
//     Route::get("/login/{user}/edit", "edit")->name("login.edit");
//     Route::put("/login/{user}", "update")->name("login.update");
//     Route::get("/logout", "logout")->name("login.logout");
//     Route::delete("/destroy/{user}", "destroy")->name("login.destroy");
// });

// para usar o resoucer, precisa que todas as rotas estejam iguais, conforme na documentação, exemplo: login/login/edit etc...
Route::resource("login", LoginController::class);
Route::get("/logout", [LoginController::class, "logout"])->name("login.logout");


Route::controller(RegisterController::class)->group(function(){
    Route::get("/register", "index")->name("register.index");
    Route::get("/register/create", "create")->name("register.create");
    Route::Post("/register", "store")->name("register.store");
    Route::get("/register{user}", "show")->name("register.show");
    Route::get("/register{user}/edit", "edit")->name("register.edit");
    Route::put("/register{user}", "update")->name("register.update");
    Route::delete("/destroy{user}", "destroy")->name("register.destroy");
});


// Route::get('/login', [LoginController::class, 'index'])->name('login.index');
// Route::Post('/login', [LoginController::class, "store"])->name("login.store");
// Route::get('/logout', [LoginController::class, "destroy"])->name("login.destroy");
