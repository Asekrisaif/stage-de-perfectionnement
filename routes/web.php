<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TypeCompteurController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\CompteurController;
use App\Http\Controllers\ChartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('utilisateur.login');
});


Route::get('/regions', [RegionController::class, 'index']);
Route::get('/ajouterregions', [RegionController::class, 'ajouter_region']);
Route::post('/ajouter/regions', [RegionController::class, 'ajouter_region_traitement']);
Route::get('/update_region/{id}', [RegionController::class, 'update_region']);
Route::post('/update/region', [RegionController::class, 'update_region_traitement']);
Route::delete('/delete_region/{id}', [RegionController::class, 'delete_region'])->name('delete_region');
Route::get('/pdfregion',[RegionController::class,'pdfregion']);

Route::get('/utilisateurs', [UtilisateurController::class, 'index']);
Route::get('/ajouter', [UtilisateurController::class, 'ajouter_utilisateur']);
Route::post('/ajouter/traitement', [UtilisateurController::class, 'ajouter_utilisateur_traitement']);
Route::get('/update_utilisateur/{id}', [UtilisateurController::class, 'update_utilisateur']);
Route::post('/update/traitement', [UtilisateurController::class, 'update_utilisateur_traitement']);
Route::get('/delete_utilisateur/{id}', [UtilisateurController::class, 'delete_utilisateur']);
Route::get('/login',[UtilisateurController::class,'login']);
Route::post('login_utilisateur',[UtilisateurController::class,'login_utilisateur'])->name('login_utilisateur');
Route::get('/dashboard', [UtilisateurController::class, 'dashboard'])->name('dashboard');
Route::get('/welcome', [UtilisateurController::class, 'welcome'])->name('welcome');
Route::get('/pdfutilisateur',[UtilisateurController::class,'pdfutilisateur']);


Route::get('/type_compteurs', [TypeCompteurController::class, 'index']);
Route::get('/ajoutertypecompteurs', [TypeCompteurController::class, 'ajouter_typecompteur']);
Route::post('/ajouter/typecompteurs', [TypeCompteurController::class, 'ajouter_typecompteur_traitement']);
Route::get('/update_typecompteur/{id}', [TypeCompteurController::class, 'update_typecompteur']);
Route::post('/update/typecompteur', [TypeCompteurController::class, 'update_typecompteur_traitement']);
Route::delete('/delete_typecompteur/{id}', [TypeCompteurController::class, 'delete_typecompteur'])->name('delete_typecompteur');
Route::get('/pdftypecompteur',[TypeCompteurController::class,'pdftypecompteur']);

Route::get('/familles', [FamilleController::class, 'index']);
Route::get('/ajouterfamilles', [FamilleController::class, 'ajouter_famille']);
Route::post('/ajouter/familles', [FamilleController::class, 'ajouter_famille_traitement']);
Route::get('/update_famille/{id}', [FamilleController::class, 'update_famille']);
Route::post('/update/famille', [FamilleController::class, 'update_famille_traitement']);
Route::delete('/delete_famille/{id}', [FamilleController::class, 'delete_famille'])->name('delete_famille');
Route::get('/famillepdf', [FamilleController::class, 'famillepdf']);



Route::get('/locals', [LocalController::class, 'index']);
Route::get('/ajouterlocals', [LocalController::class, 'ajouter_local']);
Route::post('/ajouter/locals', [LocalController::class, 'ajouter_local_traitement']);
Route::get('/update_local/{id}', [LocalController::class, 'update_local'])->name('update_local');
Route::post('/update/local', [LocalController::class, 'update_local_traitement'])->name('update_local_traitement');
Route::delete('/delete_local/{id}', [LocalController::class, 'delete_local'])->name('delete_local');
Route::get('/pdflocal',[LocalController::class,'pdflocal']);

Route::get('/compteurs', [CompteurController::class, 'index']);
Route::get('/ajoutercompteurs', [CompteurController::class, 'ajouter_compteur']);
Route::post('/ajouter/compteurs', [CompteurController::class, 'ajouter_compteur_traitement']);
Route::get('/update_compteur/{id}', [CompteurController::class, 'update_compteur']);
Route::post('/update/compteur', [CompteurController::class, 'update_compteur_traitement']);
Route::delete('/delete_compteur/{id}', [CompteurController::class, 'delete_compteur'])->name('delete_compteur');
Route::get('/graphe', [CompteurController::class, 'graphe']);
Route::get('/moyconsommation', [CompteurController::class, 'moyconsommation']);
Route::get('/compteurpdf', [CompteurController::class, 'compteurpdf']);


 // Moved to its own route

Route::get('/factures', [FactureController::class, 'index']);
Route::get('/ajouterfactures', [FactureController::class, 'ajouter_facture']);
Route::post('/ajouter/factures', [FactureController::class, 'ajouter_facture_traitement']);
Route::get('/update_facture/{id}', [FactureController::class, 'update_facture']);
Route::post('/update/facture', [FactureController::class, 'update_facture_traitement']);
Route::delete('/delete_facture/{id}', [FactureController::class, 'delete_facture'])->name('delete_facture');
Route::get('/facturepdf', [FactureController::class, 'facturepdf']);
