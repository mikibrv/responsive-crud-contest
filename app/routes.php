<?php
Route::get('/', "MikiBrv\Controllers\IndexController@index");

//i have no alternative but to use post since the URL might have many variables
Route::post("/api/teams/fetch", "MikiBrv\Controllers\TeamsAPI@fetch");
Route::get("/api/teams/fetch", "MikiBrv\Controllers\TeamsAPI@fetch");