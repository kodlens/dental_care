<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    // if(Auth::check()){
    //     $user = Auth::user();
    //     return view('welcome')
    //         ->with('user', $user->only(['lname', 'fname', 'mname', 'suffix', 'role', 'remark', 'office_id']));
    // }
    return view('welcome');
});
Route::get('/get-dental-services', [App\Http\Controllers\Administrator\ServicesController::class, 'getDentalServices']);


Auth::routes([
    'login' => 'false'
]);


Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/sample',[App\Http\Controllers\SampleController::class,'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sign-up', [App\Http\Controllers\SignUpController::class, 'index']);

Route::get('/covid-updates', [App\Http\Controllers\CovidUpdatesController::class, 'index']);

Route::post('/sign-up', [App\Http\Controllers\SignUpController::class, 'store']);


//QUICK BOOK NOW
Route::post('/book-now', [App\Http\Controllers\BookNowController::class, 'store']);




Route::get('/dental-chart', [App\Http\Controllers\DentalChartController::class, 'index']);




//ADDRESS
Route::get('/load-provinces', [App\Http\Controllers\AddressController::class, 'loadProvinces']);
Route::get('/load-cities', [App\Http\Controllers\AddressController::class, 'loadCities']);
Route::get('/load-barangays', [App\Http\Controllers\AddressController::class, 'loadBarangays']);




/*     ADMINSITRATOR          */
Route::resource('/admin-home', App\Http\Controllers\Administrator\AdminHomeController::class);

Route::resource('/users', App\Http\Controllers\Administrator\UserController::class);
Route::get('/get-users', [App\Http\Controllers\Administrator\UserController::class, 'getUsers']);
Route::get('/get-user-offices', [App\Http\Controllers\Administrator\UserController::class, 'getOffices']);

//services
Route::resource('/services', App\Http\Controllers\Administrator\ServicesController::class);
Route::get('/get-services', [App\Http\Controllers\Administrator\ServicesController::class, 'getServices']);
//Route::get('/get-open-appointment-types', [App\Http\Controllers\ServicesController::class, 'getOpenSer']);


Route::resource('/request-appointment', App\Http\Controllers\Administrator\RequestAppointment::class);
Route::get('/get-request-appointments', [App\Http\Controllers\Administrator\RequestAppointment::class, 'getRequestAppointments']);


Route::resource('/appointments', App\Http\Controllers\Administrator\AppointmentController::class);
Route::get('/get-appointments', [App\Http\Controllers\Administrator\AppointmentController::class, 'getAppointments']);


Route::get('/report-track', [App\Http\Controllers\Administrator\ReportTrackController::class, 'index']);
Route::get('/get-report-track', [App\Http\Controllers\Administrator\ReportTrackController::class, 'getReportTrack']);

//Offices Administrator (For office management)

/*     ADMINSITRATOR          */


Route::resource('/dentist', App\Http\Controllers\Administrator\DentistController::class);
Route::get('/get-dentist', [App\Http\Controllers\Administrator\DentistController::class, 'getDentists']);
Route::get('/get-browse-dentist', [App\Http\Controllers\Administrator\DentistController::class, 'getBrowseDentist']);




//USER
Route::resource('/my-appointment', App\Http\Controllers\MyAppointmentController::class);
Route::get('/get-my-appointments', [App\Http\Controllers\MyAppointmentController::class, 'getMyAppointments']);
Route::post('/cancel-my-appointment/{id}', [App\Http\Controllers\MyAppointmentController::class, 'cancelMyAppointment']);



Route::resource('/dashboard-user', App\Http\Controllers\User\DashboardUserController::class);
Route::get('/get-user', [App\Http\Controllers\User\DashboardUserController::class, 'getUser']);


Route::resource('/my-profile', App\Http\Controllers\User\MyProfileController::class);
Route::get('/get-my-profile', [App\Http\Controllers\User\MyProfileController::class, 'getProfile']);

Route::get('/my-upcoming-appointment', [App\Http\Controllers\User\MyAppointmentController::class, 'upcomingAppointment']);







Route::get('/session', function(){
    return Session::all();
});


Route::get('/applogout', function(Request $req){
    \Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();


});
