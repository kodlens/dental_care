<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Admit;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;



class AppointmentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $services = Service::orderBy('service', 'asc')->get();

        return view('administrator.appointment')
            ->with('services', $services);
    }

    public function getAppointments(Request $req){

        $sort = explode('.', $req->sort_by);

        $data = DB::table('appointments as a')
            ->join('users as b', 'a.dentist_id', 'b.user_id')
            ->join('services as c', 'a.service_id', 'c.service_id')
            ->join('users as d', 'a.user_id', 'd.user_id')
            ->select('a.*', 'b.lname as dentist_lname', 'b.fname as dentist_fname',
                'b.mname as dentist_mname',
                'c.*', 'd.lname as user_lname', 'd.fname as user_fname', 'd.mname as user_mname')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }

    public function update(Request $req, $id){

        $date =  $req->appointment_date; //date and time
        $ndate = date("Y-m-d", strtotime($date)); //convert to date format UNIX
        $ntime = date("H:i:s", strtotime($date)); //convert to date format UNIX

        $data = Appointment::find($id);
        $data->service_id = $req->service_id;
        $data->appoint_date = $ndate;
        $data->appoint_time = $ntime;
        $data->dentist_id = $req->dentist_id;
        $data->save();

        return response()->json([
            'status' => 'updated'
        ], 200);
    }


    public function appointmentAdmit($id){

        $data = Appointment::find($id);
        $data->appoint_status = 1;
        $data->save();

        Admit::create([
            'appointment_id' => $id,
            'patient_id' => $data->user_id,
            'service_id' => $data->service_id,
            'qr_code' => $data->qr_code,
            'dentist_id' => $data->dentist_id,
        ]);

        return response()->json([
            'status' => 'admitted'
        ], 200);
    }


    public function appointmentCancel($id){

        $data = Appointment::find($id);
        $data->appoint_status = 2;
        $data->save();

        return response()->json([
            'status' => 'cancelled'
        ], 200);

    }


}
