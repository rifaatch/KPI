<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* leads  *****************************************************************/
Route::get('/leads/setdata','API\LeadSetData@addData') ;

Route::post('/leads/setdata','API\LeadSetData@addData') ;

Route::post('/leads/changeleadownwer','API\LeadChangeOwner@change') ;

Route::get('/leads/changeleadownwer','API\LeadChangeOwner@change') ;

/****************************************************************************************/


/* Application  **************************************************************************/

Route::get('/aplications/setdata','API\ApplicationSetData@addData') ;

Route::post('/aplications/setdata','API\ApplicationSetData@addData') ;

Route::post('/aplications/change-application-ownwer','API\ApplicationChangeOwner@change') ;

Route::get('/aplications/change-application-owner','API\ApplicationChangeOwner@change') ;


/*****************************************************************************************/

/* Contacts ******************************************************************************/

Route::get('/contacts/setdata','API\ContactsSetData@addData') ;

Route::post('/contacts/setdata','API\ContactsSetData@addData') ;

Route::post('/contacts/change-contact-owner','API\ContactsChangeOwner@change') ;

Route::get('/contacts/change-contact-owner','API\ContactsChangeOwner@change') ;

