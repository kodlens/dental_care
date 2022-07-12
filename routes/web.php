<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Models\Appointment;
use App\Models\User;
use App\Models\DentistSchedule;




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


Route::get('/get-open-dentists', function () {
    $dentists = User::where('role', 'DENTIST')
        ->orderBy('lname', 'asc')->get();
    return $dentists;
});

Route::get('/get-dentist-schedules/{id}', function ($id) {
    $schedules = DentistSchedule::with(['user'])
        ->whereHas('user', function($q) use ($id){
            $q->where('user_id', $id);
        })
        ->get();
    return $schedules;
});


Auth::routes([
    'login' => 'false'
]);

Route::get('/load-user', function(){
    if(Auth::check()){
        return Auth::user();
    }
});




Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/sample',[App\Http\Controllers\SampleController::class,'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sign-up', [App\Http\Controllers\SignUpController::class, 'index']);
Route::post('/sign-up', [App\Http\Controllers\SignUpController::class, 'store']);


Route::get('/get-user/{id}', [App\Http\Controllers\OpenUserController::class, 'getUser']);





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
Route::post('/user-reset-password/{id}', [App\Http\Controllers\Administrator\UserController::class, 'resetPassword']);


//services
Route::resource('/services', App\Http\Controllers\Administrator\ServicesController::class);
Route::get('/get-services', [App\Http\Controllers\Administrator\ServicesController::class, 'getServices']);
Route::get('/get-all-services', [App\Http\Controllers\Administrator\ServicesController::class, 'getAllServices']);

//Route::get('/get-open-appointment-types', [App\Http\Controllers\ServicesController::class, 'getOpenSer']);


Route::resource('/request-appointment', App\Http\Controllers\Administrator\RequestAppointment::class);
Route::get('/get-request-appointments', [App\Http\Controllers\Administrator\RequestAppointment::class, 'getRequestAppointments']);


Route::resource('/appointments', App\Http\Controllers\Administrator\AppointmentController::class);
Route::get('/get-appointments', [App\Http\Controllers\Administrator\AppointmentController::class, 'getAppointments']);
Route::post('appointment-admit/{id}', [App\Http\Controllers\Administrator\AppointmentController::class, 'appointmentAdmit']);
Route::post('appointment-cancel/{id}', [App\Http\Controllers\Administrator\AppointmentController::class, 'appointmentCancel']);

Route::get('/report/inventory', [App\Http\Controllers\Administrator\ReportController::class, 'reportInventory']);
Route::get('/report/get-inventory', [App\Http\Controllers\Administrator\ReportController::class, 'getReportInventory']);
Route::get('/report/appointment', [App\Http\Controllers\Administrator\ReportController::class, 'reportAppointment']);
Route::get('/report/get-appointment', [App\Http\Controllers\Administrator\ReportController::class, 'getReportAppointment']);
Route::get('/report/print-appointment', [App\Http\Controllers\Administrator\ReportController::class, 'printAppointment']);


Route::get('/get-report-track', [App\Http\Controllers\Administrator\ReportController::class, 'getReportTrack']);

//Offices Administrator (For office management)

/*     ADMINSITRATOR          */


//USER
//dentist
//Route::resource('/dentist', App\Http\Controllers\Administrator\DentistController::class);
//Route::get('/get-dentist', [App\Http\Controllers\Administrator\DentistController::class, 'getDentists']);


Route::get('/get-browse-dentist', [App\Http\Controllers\Administrator\DentistController::class, 'getBrowseDentist']);




//APPOINTMENT
Route::resource('/my-appointment', App\Http\Controllers\MyAppointmentController::class);
Route::get('/get-my-appointments', [App\Http\Controllers\MyAppointmentController::class, 'getMyAppointments']);
Route::post('/cancel-my-appointment/{id}', [App\Http\Controllers\MyAppointmentController::class, 'cancelMyAppointment']);
Route::post('/change-password', [App\Http\Controllers\MyAppointmentController::class, 'changePassword']);


//ITEM
Route::resource('/items', App\Http\Controllers\Administrator\ItemController::class);
Route::get('/get-items', [App\Http\Controllers\Administrator\ItemController::class, 'getItems']);
Route::get('/get-browse-items', [App\Http\Controllers\Administrator\ItemController::class, 'getBrowseItems']);


Route::resource('/dashboard-user', App\Http\Controllers\User\DashboardUserController::class);
Route::get('/get-user', [App\Http\Controllers\User\DashboardUserController::class, 'getUser']);
Route::get('/get-dashboard-info', [App\Http\Controllers\User\DashboardUserController::class, 'getDashboardInfo']);

Route::resource('/my-profile', App\Http\Controllers\User\MyProfileController::class);
Route::get('/get-my-profile', [App\Http\Controllers\User\MyProfileController::class, 'getProfile']);

Route::get('/my-upcoming-appointment', [App\Http\Controllers\User\MyAppointmentController::class, 'upcomingAppointment']);



//DENTIST MODULE
Route::resource('/dentist/dashboard', App\Http\Controllers\Dentist\DashboardController::class);
Route::get('/dentist/get-dashboard-info', [App\Http\Controllers\Dentist\DashboardController::class, 'getDashboardInfo']);

Route::resource('/dentist/appointments', App\Http\Controllers\Dentist\DentistAppointmentController::class);

Route::get('/dentist/get-appointments', [App\Http\Controllers\Dentist\DentistAppointmentController::class, 'getAppointments']);

Route::post('/dentist/approve-appointment/{id}', [App\Http\Controllers\Dentist\DentistAppointmentController::class, 'approveAppointment']);

Route::post('/dentist/cancel-appointment/{id}', [App\Http\Controllers\Dentist\DentistAppointmentController::class, 'cancelAppointment']);

Route::post('/dentist/admit-appointment/{id}', [App\Http\Controllers\Dentist\DentistAppointmentController::class, 'admitAppointment']);


Route::resource('/dentist/my-patients', App\Http\Controllers\Dentist\DentistMyPatientController::class);
Route::get('/dentist/get-admits-patients', [App\Http\Controllers\Dentist\DentistMyPatientController::class, 'getAdmitsPatients']);
Route::get('/dentist/get-admit/{id}', [App\Http\Controllers\Dentist\DentistMyPatientController::class, 'getAdmit']);

//My Dentist Profile
Route::resource('/dentist/my-profile', App\Http\Controllers\Dentist\DentistMyProfileController::class);
Route::get('/dentist/get-my-profile', [App\Http\Controllers\Dentist\DentistMyProfileController::class, 'myProfile']);
Route::get('/dentist/change-password', [App\Http\Controllers\Dentist\DentistMyProfileController::class, 'changePassword']);


//Dentist Schedule
Route::resource('/dentist/dentist-schedule', App\Http\Controllers\Dentist\DentistScheduleContoller::class);
Route::put('/dentist/dentist-schedule-update', [App\Http\Controllers\Dentist\DentistScheduleContoller::class, 'update']);

Route::get('/dentist/get-dentist-schedules', [App\Http\Controllers\Dentist\DentistScheduleContoller::class, 'getDentistSchedules']);




//patient dentist dashboard
//during admit
Route::resource('/dentist/dentist-dashboard-patients', App\Http\Controllers\Dentist\DentistDashboardPatientController::class);

Route::resource('/dentist/dentist-service-patient', App\Http\Controllers\Dentist\DentistServicePatientController::class);


//admit services table

Route::resource('/dentist/admit-services', App\Http\Controllers\Dentist\DentistAdmitServiceController::class);
Route::get('/dentist/get-admit-services/{id}/{tid}', [App\Http\Controllers\Dentist\DentistAdmitServiceController::class, 'getAdmitServices']);


//service inventory
Route::post('/dentist/admit-services-inventory', [App\Http\Controllers\Dentist\DentistServiceInventoryController::class, 'store']);
Route::delete('/dentist/admit-services-inventory/{id}', [App\Http\Controllers\Dentist\DentistServiceInventoryController::class, 'destroy']);






//possible below not use
Route::post('/dentist/pending-appointment/{id}', [App\Http\Controllers\Dentist\DentistAppointmentController::class, 'pendingAppointment']);

Route::get('/dentist/services-log', [App\Http\Controllers\Dentist\DentistAppointmentController::class, 'servicesLog']);
Route::get('/dentist/get-services-log', [App\Http\Controllers\Dentist\DentistAppointmentController::class, 'getServicesLog']);


Route::resource('/dentist/dentist-items', App\Http\Controllers\Dentist\DentistItemController::class);
Route::get('/dentist/get-dentist-items', [App\Http\Controllers\Dentist\DentistItemController::class, 'getDentistItems']);


//appointment services controller

//Route::resource('/dentist/appointment-services', App\Http\Controllers\Dentist\AppointmentServiceController::class);

//inventory item for each service
//Route::resource('/dentist/services-log-inv', App\Http\Controllers\Dentist\DentistServiceInventoryController::class);



//ITEM sa dentist
Route::resource('/dentist/items', App\Http\Controllers\Dentist\ItemController::class);
Route::get('/dentist/get-items', [App\Http\Controllers\Dentist\ItemController::class, 'getItems']);
Route::get('/dentist/get-browse-items', [App\Http\Controllers\Dentist\ItemController::class, 'getBrowseItems']);






Route::get('/session', function(){
    return Session::all();
});


Route::get('/before', function(){
    //return Session::all();


    $beforeDay = date('Y-m-d H:i', strtotime('+24 hour', strtotime(date('Y-m-d H:i'))));

    $data = \DB::table('appointments')
        ->where('appoint_date', date('Y-m-d', strtotime($beforeDay)))
        ->where('appoint_time', date('H:i', strtotime($beforeDay)))
        ->where('is_notify', 0)
        ->get();

    foreach($data as $i){

        $user = User::find($i->user_id);

        $msg = 'Hi '.$user->lname . ', ' . $user->fname . ', this is just a reminder that you have an appointment tomorrow. Your ref no. is: ' . $i->qr_code . '.';
        try{
            Http::withHeaders([
                'Content-Type' => 'text/plain'
            ])->post('http://'. env('IP_SMS_GATEWAY') .'/services/api/messaging?Message='.$msg.'&To='.$user->contact_no.'&Slot=1', []);
        }catch(Exception $e){} //just hide the error

        $appoint = Appointment::find($i->appointment_id);
        $appoint->is_notify = 1;
        $appoint->save();
    }

    //$beforeDay = date($today, strtotime('-1 day'));
    return $data;
});




Route::get('/collect', function(){
    return $collection = collect([1, 2, 3]);
});


Route::get('/applogout', function(Request $req){
    \Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();


});
