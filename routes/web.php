<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionSalleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GestController;
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

// Test Authentification
Route::get('/', 'App\Http\Controllers\HomeController@checkAuth');

// Route pour dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Route Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['admin'])->group(function() {

// Route vers Gestion des salles
Route::get('/salle', 'App\Http\Controllers\AdminController@showSalle' 
)->name('admin.gestionSalle');

//Route pour Ajouter salle
Route::post('/addsalle/post', 'App\Http\Controllers\AdminController@addSalle'
)->name('admin.addSalle'); 

//Route pour Editer salle
Route::post('/updateSalle', 'App\Http\Controllers\AdminController@updateSalle'
)->name('admin.editSalle');

//Route pour Supprimer salle
Route::get('deleteSalle/id/{id}', 'App\Http\Controllers\AdminController@deleteSalle' 
)->name('admin.deleteSalle');

//Route pour Rechercher salle par batiment
Route::get("/salle/search/{batiment}", 'App\Http\Controllers\AdminController@searchBat'
)->name('admin.searchBat');

//Routes pour Importer salle
Route::post('/salle', 'App\Http\Controllers\ImportController@parseImport'
)->name('import_parse');
Route::post('/import_process', 'App\Http\Controllers\ImportController@processImport'
)->name('import_process');


/*---------------------------------*/

// Route vers Gestion des utilisateurs
Route::get('/user', 'App\Http\Controllers\AdminController@showUser' 
)->name('admin.gestionUser');

 //Route pour Ajouter utilisateur
 Route::post('/addUser/validate', 'App\Http\Controllers\AdminController@addUser' 
 )->name('admin.storeUser');

//Route pour Editer utilisateur
Route::post('/updateUser', 'App\Http\Controllers\AdminController@updateUser'
)->name('admin.updateUser');

//Route pour Supprimer utilisateur
Route::get('/delete/id/{id}', 'App\Http\Controllers\AdminController@deleteUser' 
)->name('admin.destroy');

});
/*
|--------------------------------------------------------------------------
| FIN Route Admin
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Route Tech
|--------------------------------------------------------------------------
*/

Route::middleware(['tech'])->group(function() {

//Route vers Ajouter Informations aux salles
 Route::get('/tech/index', 'App\Http\Controllers\TechController@index' 
 )->name('tech.index');


 //Route pour Rechercher salle par batiment
Route::get("/tech/search/{batiment}", 'App\Http\Controllers\TechController@searchBat'
)->name('tech.searchBat');

});
/*
|--------------------------------------------------------------------------
| FIN Route Tech
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Route Gest
|--------------------------------------------------------------------------
*/

Route::middleware(['gest'])->group(function() {

//Route vers Index
Route::get('/gest/index', 'App\Http\Controllers\GestController@index' 
)->name('gest.index');

//Route pour Rechercher salle par batiment
Route::get("/gest/search/{batiment}", 'App\Http\Controllers\GestController@searchBat'
)->name('gest.searchBat');

Route::get("/edit", 'App\Http\Controllers\GestController@index' 
)->name('gest.edit');

//Route vers la page créer
Route::get("/create", function(){
    return view('gest.create');
 })->name('gest.create');

 Route::post("/store", 'App\Http\Controllers\GestController@store' 
)->name('gest.store');

});
/*
|--------------------------------------------------------------------------
| FIN Route Gest
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Route Commun
|--------------------------------------------------------------------------
*/
Route::middleware(['user'])->group(function() {

//Route vers Voir photo
Route::get("/{id}/showPhoto/", 'App\Http\Controllers\CommonController@showPhoto'
)->name('showPhoto');

//Route pour editer photo
Route::get("/{id}/editPhoto/{fileName}", 'App\Http\Controllers\CommonController@editSelectedPhoto'
)->name('editPhoto');

//Route pour Ajouter photo
Route::post("/{id}/showPhoto", 'App\Http\Controllers\CommonController@storePhoto'
)->name('storePhoto');

//Route pour Supprimer photo
Route::delete('/photo/{id}', 'App\Http\Controllers\CommonController@destroyPhoto'
)->name('photo.destroy');

//Route pour Rechercher photo
Route::get("/showPhotos/{id}", 'App\Http\Controllers\CommonController@searchPhoto'
)->name('photo.search');

//Route pour Editer photo
Route::put('updatePhoto/{id}/{fileName}', 'App\Http\Controllers\CommonController@updatePhoto'
)->name('updatePhoto');

//Route pour Tourner photo
Route::post('rotatePhoto/{id}/{fileName}', 'App\Http\Controllers\CommonController@orientate'
)->name('rotate');

/*---------------------------------*/

 //Route pour Ajouter informations dans Informations aux salles
 Route::get('/{id}/showInfo/', 'App\Http\Controllers\CommonController@showInfo' 
 )->name('showInfo');

//Route pour Ajouter Info
Route::post("/{id}/showInfo/", 'App\Http\Controllers\CommonController@storeInfo'
)->name('storeInfo');

//Route pour Supprimer photo
Route::delete('/info/{id}', 'App\Http\Controllers\CommonController@destroyInfo'
)->name('info.destroy');

});

/*
|--------------------------------------------------------------------------
| Route Utilisateur authentifié
|--------------------------------------------------------------------------
*/