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

//Route pour Importer salle
Route::post('/salle', 'App\Http\Controllers\ImportController@parseImport'
)->name('import_parse');

Route::post('/import_process', 'App\Http\Controllers\ImportController@processImport'
)->name('import_process');

/*---------------------------------*/

//Route vers Voir photo
Route::get("/{id}/showPhoto/", 'App\Http\Controllers\AdminController@showPhoto'
)->name('showPhoto');

//Route pour Ajouter photo
Route::post("/{id}/showPhoto", 'App\Http\Controllers\AdminController@storePhoto'
)->name('admin.storePhoto');

//Route pour Supprimer photo
Route::delete('/photo/{id}', 'App\Http\Controllers\AdminController@destroyPhoto'
)->name('admin.photo.destroy');

//Route pour Rechercher photo
Route::get("/showPhotos/{id}", 'App\Http\Controllers\AdminController@searchPhoto'
)->name('photo.search');

//Route pour Editer photo
Route::put('updatePhoto/{id}/{fileName}', 'App\Http\Controllers\AdminController@updatePhoto'
)->name('admin.updatePhoto');

//Route pour Tourner photo
Route::post('rotatePhoto/{id}/{fileName}', 'App\Http\Controllers\AdminController@orientate'
)->name('admin.rotate');

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