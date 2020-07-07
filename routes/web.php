<?php

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

use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    /*(new App\Http\Controllers\Auth\RegisterController)->create([
        'nomUtilisateur'=>nomUser(),
        'password'=>'12345678',
        'profil'=>'directeur',
    ]);*/
    return view('layout.accueil');
})->name('acc');


Route::group(['middleware'=>['auth','directeur']],function(){
    Route::post('enregistrerProf','ControllerClasseProf@enregistrer')->name('enregistrerProf');
    Route::get('/modifNote','ControllerEvaluation@store')->name('modifNote');
    Route::resource('evaluationArabe','ControllerEvaluationArabe');
    Route::get('/affecter','ControllerSurveillant@affecterSurv')->name('affecterSurv');
    Route::post('/surveilleClasse','ControllerSurveillant@surveille')->name('surveille');
    Route::resource('surveillant', 'ControllerSurveillant');
    Route::resource('connexionSurveillant', 'ConnexionSurveillant');
    Route::get('/accueil',function(){
        Flashy::message("Bienvenue sur la page d'accueil");
        return view('utilisateur.accueil');
    })->name('accueil')->middleware(['auth','directeur']);
    Route::resource('matiereArabe', 'ControllerMatiereArabe');
    Route::resource('anneeScolaire','ControllerAnneeScolaire');
    Route::resource('carte','ControllerCarteEleve');
    Route::resource('professeur','ControllerProfesseur');
    //Route::get('/reinscriptionEleve','ControllerEleve@reinscription')->name('eleve.reinscription');
    Route::resource('inscription', 'ControllerInscription');
    Route::resource('classematiere', 'ControllerClasseMatiere');
    Route::resource('classe', 'ControllerClasse');
    Route::resource('eleve', 'ControllerEleve');
    Route::resource('classeProf', 'ControllerClasseProf');
    Route::resource('imprimerBultin','ControllerImprimerBultin');
    Route::get('/afficherBultin','ControllerBultin@afficher')->name('bultin.afficher');
    Route::get('enregistrerBultin','ControllerBultin@bultincreer');
    Route::resource('bultin', 'ControllerBultin');
    Route::resource('evaluation','ControllerEvaluation');
    Route::resource('note', 'ControllerNote');
    Route::delete('/supprimer','ControllerMatiere@supprimer')->name('supprimer.matiere');
    Route::resource('matiere', 'ControllerMatiere');
    Route::resource('tuteur','ControllerTuteur');
    Route::resource('mensualite', 'ControllerMensualite');
    Route::get('/prof', 'ProfesseurController@index');
    Route::resource('mois', 'ControllerMois');
});

Route::group(['middleware' => ['auth','professeur']], function () {
    Route::get('/detailClasse','ConnexionProf@afficherClasse')->name('classe');
    Route::get('/mesClasses','ConnexionProf@afficherMesClasse')->name('mesClasses');
    Route::resource('connexionProf', 'ConnexionProf');
    Route::get('profil','ConnexionProf@profil')->name('profilProf');
    Route::post('profil','ConnexionProf@modifierProfil')->name('modifierProfil');

});
Route::group(['middleware'=>['auth','eleve']],function(){
    Route::resource('connexionEleve', 'connexionEleve');
});

//Route::get('anneescolaire','ControllerEleve@index');
/*Route::get('/accueil', function () {
    return view('layout.navbar');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
