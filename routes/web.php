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

    app()->bind(
        \BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateModelInterface::class,
        \App\DemoDocumentTemplateModel::class
    );

    Route::post('/document-templates/email/{documentTemplate?}',
        'DemoDocumentTemplatesController@email')->name('document-templates.email');
});