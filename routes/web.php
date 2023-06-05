<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserLocationController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect("/", "connexion");


Route::middleware("guest")->group(function () {
    Route::get("/connexion", [ConnexionController::class, "show"])->name("connexion.show");
    Route::post("/connexion", [ConnexionController::class, "login"])->name("connexion.login");
});

Route::middleware("auth")->group(function () {
    Route::get("/home", [UserLocationController::class, "index"])->name("home");
    Route::post("/logout", [LogoutController::class, "logout"])->name("logout");
});

Route::middleware(["auth", "admin"])->group(function () {
    Route::get("/clients", [ClientController::class, "index"])->name("client.index");
    Route::delete("/clients/{client}", [ClientController::class, "destroy"])->name("client.destroy");
    Route::get("/clients/create", [ClientController::class, "create"])->name("client.create");
    Route::post("/clients", [ClientController::class, "store"])->name("client.store");
    Route::get("/locations", [LocationController::class, "index"])->name("location.index");
});
