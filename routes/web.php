<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::middleware(["auth"])->group(function () {
    Route::get("/", function () {
        return view("dashboard");
    })->name("dashboard");


    Route::get("/profile", [ProfileController::class, "show"])->name("profile");
    Route::put("/profile", [ProfileController::class, "update"])->name("profile.update");

});

Route::middleware("guest")->group(function () {
    Route::get("/login", [AuthenticationController::class, "index"])->name("login");
    Route::post("/login", [AuthenticationController::class, "authenticate"])->name("login");

    Route::post("/logout", [AuthenticationController::class, "logout"])->name("logout");
});



