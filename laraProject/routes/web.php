<?php

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


Route::get('/', 'HomeController@home')
        ->name('home_content');

Route::get('/lista_eventi', 'eventController@showlistevento')
        ->name('lista_eventi');

Route::get('/FAQ', 'FAQcontroller@GetFAQ')
        ->name('FAQsito');

Route::view('/MetodiPagamento', 'metodi_pagamento')
        ->name('MetodiPagamento');

Route::view('/Contatti', 'Contatti')
        ->name('Contatti');

// Rotte per l'autenticazione
Route::get('/login', 'Auth\LoginController2@showLoginForm')
        ->name('login');

Route::post('/login', 'Auth\LoginController2@login');

Route::post('logout', 'Auth\LoginController2@logout')
        ->name('logout');

Route::get('register', 'Auth\RegisterController2@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController2@register');// rotta per la registrazione

Route::get('/filter', 'eventController@filter_eventi')
        ->name('filter');

Route::get('/event/{id}', 'eventController@get_evento')
        ->name('get_evento');

Route::view('/ProvaHomeUser2', 'publicUser2')
        ->name('publicUser2');

Route::view('/FirstPageU2', 'userPage2')
        ->name('publicUser2first');

Route::get('/storic', 'storicoAcquistoController@get_storico')
        ->name('get_storico');

Route::get('/datiPersonali2', 'storicoAcquistoController@get_anagrafiche')
        ->name('anagrafiche2');

Route::get('/datiPersonali3', 'User3Controller@get_anagrafiche')
        ->name('anagrafiche3');

Route::get('/datiPersonali4', 'User4Controller@get_anagrafiche')
        ->name('anagrafiche4');

Route::get('/ModificaDatiUser2', 'storicoAcquistoController@set_anagrafiche')
        ->name('modifica2');

Route::match(['get', 'post'],'/modify', 'Auth\ModifyController2@modificare')
        ->name('modify');

Route::get('/ModificaDatiUser2PassEm', 'storicoAcquistoController@set_anagraficheEmPass')
        ->name('modificaEmPass2');

Route::match(['get', 'post'],'/modifyPassEm', 'Auth\ModifyController2@modificarePassEmm')
        ->name('modifyPassEm');
        
Route::get('/acquisto/{id_evento}', 'AcquistoController@form_acquista')
        ->name('acquisto_biglietto');

Route::match(['get', 'post'],'acquisto', 'AcquistoController@acquista')
        ->name('acquisto.biglietto');

Route::get('/riepilogo/{id_acquisto}', 'AcquistoController@get_riepilogo')
        ->name('riepilogo_biglietto');

Route::get('/iMieiEventi', 'elencoEventiPersonaliControllerUser3@get_eventi') //rotta eventi personali dell'user 3
        ->name('eventi3');

Route::get('/ModificaEventoUser3/{id_evento}', 'elencoEventiPersonaliControllerUser3@get_evento_singolo') 
        ->name('modificaEvento3');

Route::match(['get', 'post'],'/ModificaEventoUser3submit', 'elencoEventiPersonaliControllerUser3@modifica_Evento_singolo') //rotta post modifica delle info sull'evento
        ->name('modifica.evento3');

Route::get('/Elimina/{id}', 'User3Controller@cancella_evento') //rotta elimina evento user 3
        ->name('eliminaEvento');

Route::match(['get', 'post'],'/CreaEvento', 'User3Controller@set_eventOrganizzatore') //rotta post crea dell'evento
        ->name('CreaEvento');

Route::get('/CreateEvento', 'User3Controller@get_CreaEvento') //rotta per andare alla vista dell'inserimento
        ->name('CreateEvento');

Route::match(['get', 'post'],'/CreaUtente3', 'User4Controller@set_createUser3') //rotta post creazione user3
       ->name('CreaUtente3');

Route::view('/CreateUser3', 'VistaCreaUtente3') //rotta per creare User 3
       ->name('CreateUser3');

Route::get('/ListUser2', 'listUser2Controller@showlist_users') //rotta lista utenti livello 2
        ->name('ListUser2');

Route::get('/ListUser3', 'listUser3Controller@dati_singolo_utente3') //rotta lista utenti livello 3
       ->name('ListUser3');

Route::get('/EliminaUser2/{id}', 'User4Controller@cancella_user2') //rotta elimina user 2
        ->name('eliminaUser2');

Route::get('/EliminaUser3/{id}', 'User4Controller@cancella_user3') //rotta elimina user 3
        ->name('eliminaUser3');

Route::get('/EliminaFAQ/{id}', 'User4Controller@cancella_FAQ') //rotta elimina faq
        ->name('eliminaFAQ');

Route::match(['get', 'post'],'/CreaFAQ', 'FAQcontroller@set_faq') //rotta post modifica delle info sull'evento
        ->name('CreaFAQ');

Route::view('/CreateFAQ', 'VistaCreaFaq') //rotta per andare alla vista dell'inserimento
        ->name('CreateFAQ');

Route::get('/Riepilogo/{id}', 'User4Controller@cancella_FAQ') //rotta elimina faq
        ->name('eliminaFAQ');

Route::get('/ModificaFAQ/{numero}', 'FAQcontroller@modifica_FAQ')  //rotta modifica FAQ
        ->name('modificaFAQ');

Route::match(['get', 'post'],'/ModificaFAQupdate', 'FAQcontroller@update_FAQ') //rotta post modifica FAQ
        ->name('updateFAQ');

Route::get('/ModificaUser3Anagrafica/{id}', 'User4Controller@set_anagrafica3') //rotta modifica user3 da user4
        ->name('modificaUser3');

Route::match(['get', 'post'],'/modify3', 'Auth\ModifyController3@modificare') // rotta post modifica user 3
        ->name('modify3');

Route::get('/ModificaUser3Pass/{id}', 'User4Controller@set_pass3') //rotta per modificare la password dello user3 da user4
        ->name('modificaPass3');

Route::match(['get', 'post'],'/modifyPass3', 'Auth\ModifyController3@modificarePass') //rotta post modifica password user3
        ->name('modifyPass');

Route::get('/partecipa/{id_evento}', 'PartecipazioneController@segui')
        ->name('partecipa_evento');

route::get('ajax/regione','ajax\Ajax_geografia@get_regione')
        ->name('ajax.regione');

route::get('ajax/allregione','ajax\Ajax_geografia@get_all_regione')
        ->name('ajax.allregione');

route::get('ajax/province','ajax\Ajax_geografia@get_province')
        ->name('ajax.province');

route::get('ajax/allprovince','ajax\Ajax_geografia@get_all_province')
        ->name('ajax.allprovince');