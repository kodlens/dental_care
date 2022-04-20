<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
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
            ->join('dentists as c', 'a.dentist_id', 'c.dentist_id')
            ->join('services as d', 'a.service_id', 'd.service_id')
            ->join('users as e', 'a.user_id', 'e.user_id')
            ->select('a.*', 'c.*', 'd.*', 'e.lname as user_lname', 'e.fname as user_fname', 'e.mname as user_mname')
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


    public function appointmentApprove($id){
        
        $data = Appointment::find($id);
        $data->appoint_status = 1;
        $data->save();

        return response()->json([
            'status' => 'approved'
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
