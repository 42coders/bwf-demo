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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified']], function() {
    Route::get('/', 'HomeController@index')->name('home');

    \BWF\DocumentTemplates\DocumentTemplates::routes(DemoDocumentTemplatesController::class);

    Route::post( config('document_templates.base_url') . '/email/{document_template?}',
        'DemoDocumentTemplatesController@email')->name(config('document_templates.base_url') . '.email');
});