<?php

use App\hotel;
use App\Reservation;
use App\Ville;
use App\User;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

route::group(['middleware' => ['auth','admin']] , function(){

    Route::get('/dashboard', function () {

        $hotels = hotel::get();
        $reservations = Reservation::get();
        $users = User::whereNull('usertype')->get();
        $messages = \App\Contact::get();

        $total = Reservation::count();

        $newreservations = Reservation::where('status','=','Pending')->count();
        $newreservationsperc = $total == 0 ? 0 : $newreservations / $total * 100;

        $acceptedreservations = Reservation::where('status','=','Accepté')->count();
        $acceptedreservationsperc = $total == 0 ? 0 : $acceptedreservations / $total * 100;

        $Refusedreservations = Reservation::where('status','=','Refusé')->count();
        $Refusedreservationsperc = $total == 0 ? 0 : $Refusedreservations / $total * 100;
        return  view('admin.dashboard',compact('hotels','reservations','users','messages','newreservationsperc','acceptedreservationsperc','Refusedreservationsperc','newreservations','acceptedreservations','Refusedreservations'));

    });

    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id} ', 'Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}' , 'Admin\DashboardController@delete')->name('delete');
    Route::get('/avilles' , 'Admin\villeController@index')->name('avilles');
    Route::post('/save-villes' , 'Admin\villeController@store');
    Route::get('/ahotels' , 'Admin\hotelController@index')->name('ahotels');
    Route::post('/save-hotels' , 'Admin\hotelController@store');
    Route::PUT('update-v/', 'Admin\villeController@updatev')->name('updatev');
    Route::get('/villes-update/{id} ', 'Admin\villeController@edit')->name('ville-edit');
    Route::post('/destroyv' , 'Admin\villeController@destroyv')->name('destroyv');
    Route::PUT('update-h/', 'Admin\hotelController@updateh')->name('updateh');
    Route::get('/hotels-update/{id} ', 'Admin\hotelController@edit')->name('hotel-edit');
    Route::post('/destroyh' , 'Admin\hotelController@destroyh')->name('destroyh');
    Route::get('/amaisons' , 'Admin\maisonController@index');
    Route::post('/destroym' , 'Admin\maisonController@destroym')->name('destroym');
    Route::get('/destroym' , 'Admin\maisonController@destroym')->name('destroym');
    Route::get('/acontacts' , 'Admin\contactController@index');
    Route::get('/areservation' , 'Admin\reservationController@index');
    Route::post('changer-status', 'Admin\reservationController@changerstatus')->name('changer-status');

});




route::group(['prefix'=> 'moderateur', ['middleware' => ['auth','moderateur']] ], function(){

    Route::get('/dashboard2', function () {

        $hotels = hotel::where('created_by',Auth::user()->id)->get();

        $myhotels = hotel::where('created_by', Auth::user()->id)->first();
        if ($myhotels) {
            $reservations = Reservation::where('hotel_id', $myhotels->id)->get();
            return view('moderateur.dashboard2',compact('hotels','reservations'));
        }
        return view('moderateur.dashboard2',compact('hotels'));
    });
    Route::get('/hotels' , 'moderateur\hotelController@index');
    Route::post('/enregistrer-hotels' , 'moderateur\hotelController@store');
    Route::PUT('hotels', 'moderateur\hotelController@modifier')->name('modifier');
    Route::get('/hotels-modifier/{id} ', 'moderateur\hotelController@editer')->name('hotel-editer');
    Route::post('/supprimer' , 'moderateur\hotelController@supprimer')->name('supprimer');
    Route::get('/reservation' , 'moderateur\reservationController@index');
    Route::post('change-status', 'moderateur\reservationController@changerstatus2')->name('change-status');

});

Route::get('/mesReservation', function () {
    $reservations = Reservation::where('user_id',Auth::user()->id)->get();
    return view('hotels.mesReservation');
}) ->name('mesReservation') ;


Route::resource('villes', 'VilleController');

Route::resource('hotels', 'HotelController');


Route::resource('maisons', 'MaisonController');
Route::post('/maisons/{id}/store' ,'logementController@store' );
Route::resource('/aboutus', 'AboutusController');
Route::resource('/contacts', 'ContactController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/Reservation', 'reservationController@index')->name('Reservation');
Route::get('hotel/{id}/reservation', 'reservationController@index');
Route::post('/save-reservation' , 'reservationController@reservation');
