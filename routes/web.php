<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("dashboard");
})->name("dashboard");


Route::get("/login", [LoginController::class, "index"])->name("login");

