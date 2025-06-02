<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AuthenticationController;





Route::middleware(["auth"])->group(function () {
    Route::get("/", function () {
        return view("dashboard");
    })->name("dashboard");

    Route::get("/calendar", [CalendarController::class, "index"])->name("calendar.index");

    Route::name("calendar")->group(function () {
        Route::get("/day");
        Route::get("/week");
        Route::get("/month");
        Route::get("/year");
    });

    Route::get("/profile", [ProfileController::class, "show"])->name("profile");
    Route::put("/profile", [ProfileController::class, "update"])->name("profile.update");

    Route::resource("/users", UserController::class)->except(["create", "store"]);
    Route::resource("/roles", RoleController::class);
    Route::resource("/permissions", PermissionController::class)->only(["index", "show"]);


});

Route::middleware("guest")->group(function () {
    Route::get("/login", [AuthenticationController::class, "index"])->name("login");
    Route::post("/login", [AuthenticationController::class, "authenticate"])->name("login");

    Route::post("/logout", [AuthenticationController::class, "logout"])->name("logout");
});



