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

    Route::get('/byoffice/','LeadsController@leadsByOffice')
        ->name('leads.lead.byoffice');

    Route::post('/byoffice-by-date/','LeadsController@leadsByOfficeByDate')
        ->name('leads.lead.leadsByOfficeByDate');


    Route::get('/byofficebyemployees/{officeid}/{date}','LeadsController@leadsByOfficeByEmployees')
        ->name('leads.lead.byofficeemployees');

    Route::get('/byoffice-btw-2dates/','LeadsController@leadsByOfficeBtw2Dates')
        ->name('leads.lead.byofficebtw2dates');

    Route::post('/byofficebtn2date/','LeadsController@showNewleadsByOfficeByw2Dates')
        ->name('leads.lead.byofficebtw_2_dates');

    Route::get('/byoffice/byemployees/{officeid?}/{date1?}/{date2?}','LeadsController@leadsByOfficeByEmployeesBydates')
        ->name('leads.lead.byofficeemployeesbydates');

    Route::post('/byemployees/btn2date/','LeadsController@showNewleadsByEmployeesbtwdates')
        ->name('leads.newlead.byemployees.dates');

    Route::get('/listofleeads/{employeeid}/{date1}/{date2?}','LeadsController@listOfNewLeadsByemp')
        ->name('leads.newlead.list.byemp');

    Route::get('/listofleeads/search','LeadsController@search')
        ->name('leads.search');

    Route::post('/listofleeads/search/getdata','LeadsController@getSearchResult')
        ->name('leads.search.getdata');

    Route::get('/lead/bysources','LeadsController@bySources')
        ->name('leads.bysources');

    Route::post('/lead/bysources','LeadsController@groupBySources')
        ->name('leads.group.bysources');

    Route::get('/leads/details/bysources/{date1}/{date2}/{source?}','LeadsController@listOfNewLeadsBySource')
        ->name('leads.details.bysources');

    Route::get('/pendingleads','LeadsController@pendingLeads')
        ->name('leads.pending');




});

Route::group(
[
    'prefix' => 'LeadEvents',
], function () {

    Route::get('leadevents/{lead_id}', 'LeadEventsController@leadEvents')
         ->name('LeadEvents.LeadEvent.list');

    Route::get('btw2dates/', 'LeadEventsController@leadEventsBtw2dates')
        ->name('LeadEvents.LeadEvent.list.btwdates.offices');

    Route::post('byoffices/btw2dates/', 'LeadEventsController@leadEventsBtw2datesByOffices')
        ->name('LeadEvents.list.btwdates.offices');

    Route::get('byemployee/btw2dates/{office_id}/{date1}/{date2?}', 'LeadEventsController@listOfEventsByemp')
        ->name('LeadEvents.btwdates.employee');

    Route::post('byoemployee/btwdates/', 'LeadEventsController@leadEventsBtw2datesByEmployee')
        ->name('LeadEvents.list.btwdates.employees');

    Route::get('eventdetails/btw2dates/{employee_id}/{date1}/{date2?}', 'LeadEventsController@eventsDetailsByemployeeByDates')
        ->name('LeadEvents.btwdates.employee.details');

    Route::post('listevent/btwdates/', 'LeadEventsController@ListeventsByemployeeByDates')
        ->name('listEvents.btwdates.employee.details');




});

Route::group(
[
    'prefix' => 'kpi_indicators',
], function () {

    Route::get('/', 'KpiIndicatorsController@index')
         ->name('kpi_indicators.kpi_indicator.index');

    Route::get('/create','KpiIndicatorsController@create')
         ->name('kpi_indicators.kpi_indicator.create');

    Route::get('/show/{kpiIndicator}','KpiIndicatorsController@show')
         ->name('kpi_indicators.kpi_indicator.show')
         ->where('id', '[0-9]+');

    Route::get('/{kpiIndicator}/edit','KpiIndicatorsController@edit')
         ->name('kpi_indicators.kpi_indicator.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'KpiIndicatorsController@store')
         ->name('kpi_indicators.kpi_indicator.store');
               
    Route::put('kpi-indicator/{kpiIndicator}', 'KpiIndicatorsController@update')
         ->name('kpi_indicators.kpi_indicator.update')
         ->where('id', '[0-9]+');

    Route::delete('/kpi-indicator/{kpiIndicator}','KpiIndicatorsController@destroy')
         ->name('kpi_indicators.kpi_indicator.destroy')
         ->where('id', '[0-9]+');

    Route::get('/btw2dates/leads','KpiIndicatorsController@LeadsBtwDates')
        ->name('kpi_indicators.leads.btw2dates');

    Route::post('/btw2dates/leads/result','KpiIndicatorsController@resultLeadsBtwDates')
        ->name('kpi_indicators.leads.btw2dates.result');

    Route::get('/btw2dates/byemployees/{officeid}/{date1}/{date2}','KpiIndicatorsController@byEmployeesBydates')
        ->name('kpi_indicators.byemployees.btw2dates');

    Route::post('/btw2dates/result/byemployees/','KpiIndicatorsController@resultbyEmployeesBydates')
        ->name('kpi_indicators.byemployees.result');


});

Route::group(
[
    'prefix' => 'holidays',
], function () {

    Route::get('/', 'HolidaysController@index')
         ->name('holidays.holiday.index');

    Route::get('/create','HolidaysController@create')
         ->name('holidays.holiday.create');

    Route::get('/show/{holiday}','HolidaysController@show')
         ->name('holidays.holiday.show')
         ->where('id', '[0-9]+');

    Route::get('/{holiday}/edit','HolidaysController@edit')
         ->name('holidays.holiday.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'HolidaysController@store')
         ->name('holidays.holiday.store');
               
    Route::put('holiday/{holiday}', 'HolidaysController@update')
         ->name('holidays.holiday.update')
         ->where('id', '[0-9]+');

    Route::delete('/holiday/{holiday}','HolidaysController@destroy')
         ->name('holidays.holiday.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'applications',
], function () {

    Route::get('/byoffice-btw-2dates/','ApplicationsController@ApplicationByOfficeBtw2Dates')
        ->name('application.byofficebtw2dates');

    Route::post('/byofficebtn2date/','ApplicationsController@showNewApplicationsByOfficeBtw2Dates')
        ->name('application.byofficebtw_2_dates');

    Route::get('/byoffice/byemployees/{officeid?}/{date1?}/{date2?}','ApplicationsController@ByOfficeByEmployeesBydates')
        ->name('applications.byofficeemployeesbydates');

    Route::post('/byemployees/btn2date/','ApplicationsController@showNewAppsByEmployeesbtwdates')
        ->name('applications.byemployees.dates');

    Route::get('/listofapps/{employeeid}/{date1}/{date2?}','ApplicationsController@listOfNewAppsByemp')
        ->name('applications.new.byemp');

    Route::get('/application/bysources','ApplicationsController@bySources')
        ->name('applications.bysources');

    Route::post('/application/group/bysources','ApplicationsController@groupBySources')
        ->name('applications.group.bysources');

    Route::get('/application/details/bysources/{date1}/{date2}/{source?}','ApplicationsController@listOfNewAppsBySource')
        ->name('applications.details.bysources');

    Route::get('/pending/applications','ApplicationsController@pendingApplication')
        ->name('applications.pending');

    Route::get('/listofapplications/search','ApplicationsController@search')
        ->name('applications.search');

    Route::post('/listofapplications/search/getdata','ApplicationsController@getSearchResult')
        ->name('applications.search.getdata');



});

Route::group(
[
    'prefix' => 'application_events',
], function () {

    Route::get('appevent/{app_id}', 'ApplicationEventsController@AppEvents')
        ->name('appEvents.appEvent.list');

    Route::get('btw2dates/', 'ApplicationEventsController@appEventsBtw2dates')
        ->name('appEvents.list.btwdates.offices');

    Route::post('byoffices/btw2dates/', 'ApplicationEventsController@appEventsBtw2datesByOffices')
        ->name('appEvents.appEvent.list.btwdates.offices');

    Route::get('byemployee/btw2dates/{office_id}/{date1}/{date2?}', 'ApplicationEventsController@listOfEventsByemp')
        ->name('appEvents.btwdates.employee');

    Route::post('byoemployee/btwdates/', 'ApplicationEventsController@appEventsBtw2datesByEmployee')
        ->name('appEvents.list.btwdates.employees');

    Route::get('eventdetails/btw2dates/{employee_id}/{date1}/{date2?}', 'ApplicationEventsController@eventsDetailsByemployeeByDates')
        ->name('appEvents.btwdates.employee.details');

    Route::post('listevent/btwdates/', 'ApplicationEventsController@ListeventsByemployeeByDates')
        ->name('appEvents.btwdates.employee.details.submit');



});

Route::group(
[
    'prefix' => 'contacts',
], function () {



});

Route::group(
[
    'prefix' => 'contact_events',
], function () {



});
