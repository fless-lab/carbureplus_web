<?php

use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CompagnieController;
use App\Http\Controllers\ContactController;

Route::get("/",function(){
    return view("welcome");
});

Route::post("/send_contact_form",[ContactController::class,"sendMail"])->name("send.contact_email");

// Route::get("/",function(){
//     return view("com_compagnie.services.stations.add");
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
        Route::get("/liste-des-agents",[StationController::class,"listeAgents"])->name("station.agents.liste");
        Route::get("/agents",[StationController::class,"agents"])->name("station.agents");
        Route::get("/agents/{mime}/transactions",[StationController::class,"transactionsParAgent"])->name("station.agents.transactions");
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

        Route::get("/station/creer",[CompagnieController::class,'createStation'])->name("compagnie.station.create");
        Route::post("/station/creer",[CompagnieController::class,'storeStation'])->name("compagnie.station.store");
        Route::get("/stations/{mime}/update",[CompagnieController::class,"editStation"])->name("compagnie.station.edit");
        Route::put("/stations/{mime}/update",[CompagnieController::class,'updateStation'])->name("compagnie.station.update");
        Route::get("/liste-des-stations",[CompagnieController::class,"listeStations"])->name("compagnie.stations.liste");
        Route::delete("/stations/{mime}",[CompagnieController::class,"deleteStation"])->name("compagnie.station.delete");
        Route::get("/stations/{mime}",[CompagnieController::class,"afficherStation"])->name("compagnie.station.show");

        Route::get("/stations",[CompagnieController::class,"get_stations"])->name("compagnie.stations");
        Route::get("/stationss",[CompagnieController::class,"get_stations_bis"])->name("compagnie.stations.bis");

        Route::get("/stations/{mime}/agents",[CompagnieController::class,"get_agents_by_station"])->name("compagnie.stations.agents");
        Route::get("/agents",[CompagnieController::class,"get_all_agents"])->name("compagnie.agents");
        Route::get("/agents/{mime}",[CompagnieController::class,"get_agent"])->name("compagnie.agent");

        Route::get("/stations/{mime}/ventes",[CompagnieController::class,"get_ventes_by_station"])->name("compagnie.stations.ventes");
        Route::get("/ventes",[CompagnieController::class,"get_all_ventes"])->name("compagnie.ventes");


    });


    Route::group(["middleware" => ["compagnie_guest"]], function () {
        Route::get('/login',[CompagnieController::class,"getLogin"])->name("compagnie.connecter");
        Route::post('/login',[CompagnieController::class,"postLogin"])->name("compagnie.connexion");
    });

});
