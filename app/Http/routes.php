<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('magenna', 'MagennaController@index');
Route::resource('magenna/contacts', 'ContactsController');
Route::get('magenna/selectContacts', 'ContactsController@selectAll');
Route::resource('magenna/notes', 'NotesController');
Route::resource('magenna/agenda', 'AgendaController');

Route::get('/', function () 
{
    return view('welcome');
});
