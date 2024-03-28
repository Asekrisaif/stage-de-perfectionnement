<?php

use App\Http\Controllers\Api\CompteurController;
use App\Http\Controllers\Api\FactureController;
use App\Http\Controllers\Api\FamilleController;
use App\Http\Controllers\Api\LocalController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\TypeCompteurController;
use App\Http\Controllers\Api\UtilisateurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/regions', RegionController::class);
Route::apiResource('/utilisateurs', UtilisateurController::class);
Route::apiResource('/type_compteurs', TypeCompteurController::class);
Route::apiResource('/familles', FamilleController::class);
Route::apiResource('/locals', LocalController::class);
Route::apiResource('/compteurs', CompteurController::class);
Route::apiResource('/factures', FactureController::class);