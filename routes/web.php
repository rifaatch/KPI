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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
[
    'prefix' => 'employees',
], function () {

    Route::get('/', 'EmployeesController@index')
         ->name('employees.employee.index');

    Route::get('/create','EmployeesController@create')
         ->name('employees.employee.create');

    Route::get('/show/{employee}','EmployeesController@show')
         ->name('employees.employee.show')
         ->where('id', '[0-9]+');

    Route::get('/{employee}/edit','EmployeesController@edit')
         ->name('employees.employee.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'EmployeesController@store')
         ->name('employees.employee.store');
               
    Route::put('employee/{employee}', 'EmployeesController@update')
         ->name('employees.employee.update')
         ->where('id', '[0-9]+');

    Route::delete('/employee/{employee}','EmployeesController@destroy')
         ->name('employees.employee.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'offices',
], function () {

    Route::get('/', 'OfficesController@index')
         ->name('offices.office.index');

    Route::get('/create','OfficesController@create')
         ->name('offices.office.create');

    Route::get('/show/{office}','OfficesController@show')
         ->name('offices.office.show')
         ->where('id', '[0-9]+');

    Route::get('/{office}/edit','OfficesController@edit')
         ->name('offices.office.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'OfficesController@store')
         ->name('offices.office.store');
               
    Route::put('office/{office}', 'OfficesController@update')
         ->name('offices.office.update')
         ->where('id', '[0-9]+');

    Route::delete('/office/{office}','OfficesController@destroy')
         ->name('offices.office.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'leads',
], function () {

    Route::get('/', 'LeadsController@index')
         ->name('leads.lead.index');

    Route::get('/create','LeadsController@create')
         ->name('leads.lead.create');

    Route::get('/show/{lead}','LeadsController@show')
         ->name('leads.lead.show')
         ->where('id', '[0-9]+');

    Route::get('/{lead}/edit','LeadsController@edit')
         ->name('leads.lead.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'LeadsController@store')
         ->name('leads.lead.store');
               
    Route::put('lead/{lead}', 'LeadsController@update')
         ->name('leads.lead.update')
         ->where('id', '[0-9]+');

    Route::delete('/lead/{lead}','LeadsController@destroy')
         ->name('leads.lead.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'LeadEvents',
], function () {

    Route::get('/', 'LeadEventsController@index')
         ->name('LeadEvents.LeadEvent.index');

    Route::get('/create','LeadEventsController@create')
         ->name('LeadEvents.LeadEvent.create');

    Route::get('/show/{leadEvent}','LeadEventsController@show')
         ->name('LeadEvents.LeadEvent.show')
         ->where('id', '[0-9]+');

    Route::get('/{leadEvent}/edit','LeadEventsController@edit')
         ->name('LeadEvents.LeadEvent.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'LeadEventsController@store')
         ->name('LeadEvents.LeadEvent.store');
               
    Route::put('LeadEvent/{leadEvent}', 'LeadEventsController@update')
         ->name('LeadEvents.LeadEvent.update')
         ->where('id', '[0-9]+');

    Route::delete('/LeadEvent/{leadEvent}','LeadEventsController@destroy')
         ->name('LeadEvents.LeadEvent.destroy')
         ->where('id', '[0-9]+');

});
