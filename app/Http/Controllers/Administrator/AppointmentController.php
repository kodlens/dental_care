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

    public function cancelMyAppointment($id){
       
        $data = Appointment::find($id);
        $data->appoint_status = 2;
        $data->save();

        return response()->json([
            'status' => 'canceled'
        ], 200);

    }


}
