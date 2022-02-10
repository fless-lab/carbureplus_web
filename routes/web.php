<?php

use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CompagnieController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('superadmin.auth.login');
// });

Route::group(["prefix" => "superadmin"], function () {

    Route::group(["middleware" => ["superadmin_auth"]], function () {
        Route::get('', [SuperAdminController::class, "index"])->name("super.index");
        Route::get("/deconnexion", [SuperAdminController::class, "superLogout"])->name("super.deconnexion");


        Route::post("/compagnie/ajouter",[SuperAdminController::class,'storeCompagnie'])->name("super.compagnie.store");
        Route::put("/compagnies/{mime}/maj",[SuperAdminController::class,'updateCompagnie'])->name("super.compagnie.update");
        Route::get("/compagnies",[SuperAdminController::class,"listeCompagnies"])->name("super.compagnies.liste");
        Route::delete("/compagnie/{mime}/supprimer",[SuperAdminController::class,"deleteCompagnie"])->name("super.compagnies.delete");

    });


    Route::group(["middleware" => ["superadmin_guest"]], function () {
        Route::get('/login',[SuperAdminController::class,"getLogin"])->name("super.connecter");
        Route::post('/login',[SuperAdminController::class,"postLogin"])->name("super.connexion");
    });

});




Route::group(["prefix" => "station"], function () {

    Route::group(["middleware" => ["station_auth"]], function () {
        Route::get('', [StationController::class, "index"])->name("station.index");
        Route::get("/deconnexion", [StationController::class, "stationLogout"])->name("station.deconnexion");
        Route::get("/profile", [StationController::class, "profile"])->name("station.profile");
        Route::put("/maj", [StationController::class, "update"])->name("station.update");
        Route::get("/transactions", [StationController::class, "transactions"])->name("station.transactions");


        Route::get("/agent/ajouter",[StationController::class,'createAgent'])->name("station.agent.create");
        Route::post("/agent/ajouter",[StationController::class,'storeAgent'])->name("station.agent.store");
        Route::get("/agents/{mime}/maj",[StationController::class,'getUpdateForm'])->name("station.agent.update.form");
        Route::put("/agents/{mime}/maj",[StationController::class,'updateAgent'])->name("station.agent.update");
        Route::get("/agents",[StationController::class,"listeAgents"])->name("station.agents.liste");
    });


    Route::group(["middleware" => ["station_guest"]], function () {
        Route::get('/login',[StationController::class,"getLogin"])->name("station.connecter");
        Route::post('/login',[StationController::class,"postLogin"])->name("station.connexion");
    });

});

Route::group(["prefix" => "compagnie"], function () {

    Route::group(["middleware" => ["compagnie_auth"]], function () {
        Route::get('', [CompagnieController::class, "index"])->name("compagnie.index");
        Route::get("/deconnexion", [CompagnieController::class, "compagnieLogout"])->name("compagnie.deconnexion");
        Route::get("/profile", [CompagnieController::class, "profile"])->name("compagnie.profile");
        Route::put("/maj", [CompagnieController::class, "update"])->name("compagnie.update");
        Route::get("/statistiques", [CompagnieController::class, "statistiques"])->name("compagnie.statistiques");
        // Route::get("/clients/liste",[SuperAdminController::class,"listClientsInscrits"])->name("super.clients.liste");

        Route::get("/station/creer",[CompagnieController::class,'createStation'])->name("compagnie.station.create");
        Route::post("/station/creer",[CompagnieController::class,'storeStation'])->name("compagnie.station.store");
        Route::put("/stations/{mime}/maj",[CompagnieController::class,'updateStation'])->name("compagnie.station.update");
        Route::get("/stations",[CompagnieController::class,"listeStations"])->name("compagnie.stations.liste");
        Route::get("/stations/{mime}",[CompagnieController::class,"afficherStation"])->name("compagnie.station.show");

    });


    Route::group(["middleware" => ["compagnie_guest"]], function () {
        Route::get('/login',[CompagnieController::class,"getLogin"])->name("compagnie.connecter");
        Route::post('/login',[CompagnieController::class,"postLogin"])->name("compagnie.connexion");
    });

});
