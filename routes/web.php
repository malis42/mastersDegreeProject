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

Route::get('', 'HomeController@index');

// longer version of route with view
/*Route::get('about', function(){
   return view('about');
});*/

Route::view('about', 'about')->middleware('test')->name('about.index');


// shorter version of rendering view
// first argument is route, second is view file name
//Route::view('contact', 'contact');


// Show view to create contact form
Route::get('contact', 'ContactFormController@create')->name('contact.create');

// Send the form with post request
Route::post('contact', 'ContactFormController@store')->name('contact.store');

/*// List all customers
Route::get('customers', 'CustomersController@index');
// Redirect to add new customer form page
Route::get('customers/create', 'CustomersController@create');
// After hitting button 'save' we are redirected back to the index view
Route::post('customers', 'CustomersController@store');
//Testing form for new project
//Route::get('createAccount', 'UsersController@index');
// Show specific customer -> {customer} is a customers id which you want to see
Route::get('customers/{customer}', 'CustomersController@show');
// Show view for editing a specific customer
Route::get('customers/{customer}/edit', 'CustomersController@edit');
// Save changes to a specific customer, redirect to show view of that customer
Route::patch('customers/{customer}', 'CustomersController@update');
// Delete a specific customer form database
Route::delete('customers/{customer}', 'CustomersController@destroy');*/

// Refactor all of the routes above with single line due to following REST rules
Route::resource('customers', 'CustomersController');

Auth::routes();

Route::resource('measures', 'MeasuresController');

Route::resource('patients', 'PatientsController')->middleware('auth');

Route::get('/patients/{id}/{measureId}', 'PatientsController@showMeasure');

