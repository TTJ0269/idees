<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\RattacherController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\SaveController;

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

Route::get('/erreur_auth', function () {
    return view('messages.auth');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*** routes generales pour profils ***/
Route::resource('/profils', ProfilController::class);

/*** routes generales pour users ***/
Route::resource('/users', UserController::class);

/*** routes generales pour sujets ***/
Route::resource('/sujets', SujetController::class);

/*** routes generales pour sujets ***/
Route::resource('/rattachers', RattacherController::class);

/*** routes generales pour commentaire ***/
Route::resource('/commentaires', CommentaireController::class);
Route::get('/commentaires/create/{sujet}', [CommentaireController::class, 'create'])->name('commentaires_create');
Route::get('/commentaires/update', [CommentaireController::class, 'index']);
Route::post('/commentaires/update', [CommentaireController::class, 'update'])->name('commentaires_update');

/*** routes generales pour sujets ***/
Route::resource('/fichiers', FichierController::class);
Route::get('/fichiers/create/{sujet_id}', [FichierController::class, 'create'])->name('fichiers_create');
Route::get('/fichiers/download/{file}',[FichierController::class, 'Telecharger'])->name('fichiers_download');


/*** routes generales pour le profil de l'utilisateur ***/
Route::get('/profiluser', [ProfilUserController::class, 'show'])->name('profilusershow');
Route::post('/profiluser', [ProfilUserController::class, 'changeemail'])->name('profilemailchange');
Route::post('/profilpassword', [ProfilUserController::class, 'changepassword'])->name('profilpasswordchange');
Route::post('/profilphoto', [ProfilUserController::class, 'changephoto'])->name('profilphotochange');

Route::get('/erreur', function () {return view('messages.erreur');});

//Route::get('/save', [SaveController::class, 'save'])->name('save');
