<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PsycologueController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Acceuil');
})->name('acceuil');

Route::get('/login', function () {
    return view('Auth.login');
})->name('login');



Route::POST('/sendSms', [MessageController::class, 'sendSms'])->name('sendSms');
Route::get('/recupSms', [MessageController::class, 'recupSms'])->name('recupSms');
Route::get('/recupAncienSms', [MessageController::class, 'recupAncienSms'])->name('recupAncienSms');
Route::get('/chat', [ChatController::class, 'homeChatPatient'])->name('homeChatPatient');
Route::get('/chatPsycologue', [PsycologueController::class, 'chatPsycologue'])->name('chatPsycologue');
Route::get('/listePsycologue', [PsycologueController::class, 'listePsycologue'])->name('listePsycologue');
Route::get('/beginSession/{id}', [SessionController::class, 'beginSession'])->name('beginSession');


Route::post('/authentification', [AuthentificationController::class, 'authentification'])->name('authentification');
Route::get('/deconnexion', [AuthentificationController::class, 'deconnexion'])->name('deconnexion');
