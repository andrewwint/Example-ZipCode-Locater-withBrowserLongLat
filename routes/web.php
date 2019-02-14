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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/resources', 'HomeController@resources')->name('home.resources');

//Default
Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/home/{latitude}/{longitude}', 'HomeController@index')->name('home.geolocation');
Route::get('/home/widget', 'HomeController@indexWidget')->name('home.widget');

//Visitjamaica
Route::get('/visitjamaica', 'HomeController@visitjamaicaIndex')->name('visitjamaica.index');
Route::get('/visitjamaica/{latitude}/{longitude}', 'HomeController@visitjamaicaIndex')->name('visitjamaica.geolocation');
Route::get('/visitjamaica/widget', 'HomeController@visitjamaicaWidget')->name('visitjamaica.widget');

//Mobile Visitjamaica
Route::get('/visitjamaica/mobile', 'HomeController@visitjamaicaMobileIndex')->name('m.visitjamaica.index');
Route::get('/visitjamaica/mobile/{latitude}/{longitude}', 'HomeController@visitjamaicaMobileIndex')->name('m.visitjamaica.geolocation');

//Islandbuzzjamaica
Route::get('/islandbuzzjamaica', 'HomeController@islandbuzzjamaicaIndex')->name('islandbuzzjamaica.index');
Route::get('/islandbuzzjamaica/{latitude}/{longitude}', 'HomeController@islandbuzzjamaicaIndex')->name('islandbuzzjamaica.geolocation');
Route::get('/islandbuzzjamaica/widget', 'HomeController@islandbuzzjamaicaWidget')->name('islandbuzzjamaica.widget');

Route::post('/ziplookup', 'HomeController@ziplookup')->name('ziplookup');

Route::get('/profile/{userguid}/edit', 'ProfileController@profileEdit')->name('profile.edit');
Route::put('/profile/{userguid}', 'ProfileController@profileUpdate')->name('profile.update');
Route::put('/profile/{userguid}/resetpasscode', 'ProfileController@profileResetPassCode')->name('profile.resetpasscode');
Route::get('/profile/request', 'ProfileController@profileRequest')->name('profile.request');
Route::get('/profile/request/thankyou', 'ProfileController@profileRequest')->name('profile.request.thankyou');
Route::post('/profile/sendpasscode', 'ProfileController@profileSendPassCode')->name('profile.sendpasscode');
Route::get('/profile/confirmation', 'ProfileController@profileUpateConfirmation')->name('profile.update.confirmation');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('agents', 'AgentController');
    Route::get('/agents/process/bookings', 'AgentController@processBooking')->name('agents.process.bookings');
    Route::get('/agents/process/profiles', 'AgentController@processProfiles')->name('agents.process.profiles');

    Route::post('/agents/upload', function () {
        $file = request()->file('agents_excel');
        if (!empty($file)) {
            $file->storeAs('excels/', 'All_Grads.xlsx');
            //dispatch((new App\Listeners\LoadAgentProfiles())->onQueue('loadExcel'));

            return redirect('agents/create?pa');
        }
        return back();
    })->name('agents.upload');

    Route::post('/agents/update/bookings', function () {
        $file = request()->file('agents_excel');
        if (!empty($file)) {
            $file->storeAs('excels/', 'Top_Bookers.xlsx');
            //dispatch((new App\Listeners\LoadAgentBooking())->onQueue('upateBookings'));

            return redirect('agents/create?bk');
        }
        return back();
    })->name('agents.update.bookings');
});

Auth::routes();
