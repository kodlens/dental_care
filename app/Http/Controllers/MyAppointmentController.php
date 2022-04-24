<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;



class MyAppointmentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('user');

    }

    public function index(){
        $services = Service::orderBy('service', 'asc')->get();
        $user = Auth::user();
        return view('my-appointment')
            ->with('services', $services)
            ->with('user', $user);
    }


    public function show($id){

        $data = DB::table('appointments as a')
            ->join('users as b', 'a.dentist_id', 'b.user_id')
            ->join('services as d', 'a.service_id', 'd.service_id')
            ->join('users as c', 'a.user_id', 'c.user_id')
            ->select('a.appointment_id', 'a.user_id', 'a.appoint_date', 'a.appoint_time', 'a.dentist_id', 'a.appoint_status',
                'b.lname as dentist_lname', 'b.fname as dentist_fname', 'b.mname as dentist_mname', 'b.contact_no as dentist_contact_no',
                'c.lname as user_lname', 'c.fname as user_fname', 'c.mname as user_mname', 'c.sex as user_sex', 'c.contact_no as user_contact_no',
                'd.service_id', 'd.service', 'd.price')
            ->where('a.appointment_id', $id)
            ->first();


        return $data;
    }

    public function getMyAppointments(Request $req){
        $sort = explode('.', $req->sort_by);
        $user = Auth::user();


        $data = DB::table('appointments as a')
            ->join('users as b', 'a.dentist_id', 'b.user_id')
            ->join('services as d', 'a.service_id', 'd.service_id')
            ->join('users as c', 'a.user_id', 'c.user_id')
            ->select('a.appointment_id', 'a.user_id', 'a.appoint_date', 'a.appoint_time', 'a.dentist_id', 'a.appoint_status',
                'b.lname as dentist_lname', 'b.fname as dentist_fname', 'b.mname as dentist_mname', 'b.contact_no as dentist_contact_no',
                'c.lname as user_lname', 'c.fname as user_fname', 'c.mname as user_mname', 'c.sex as user_sex', 'c.contact_no as user_contact_no',
                'd.service_id', 'd.service', 'd.price')
            ->where('a.user_id', $user->user_id)
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


    public function store(Request $req){
        $req->validate([
            'appointment_date' => ['required']
        ]);

        $user = Auth::user();
        
        $qr_code = substr(md5(time() . $user->lname . $user->fname), -8);

        $date =  $req->appointment_date; //date and time
        $ndate = date("Y-m-d", strtotime($date)); //convert to date format UNIX
        $ntime = date("H:i:s", strtotime($date)); //convert to date format UNIX

        Appointment::create([
            'user_id' => $user->user_id,
            'service_id' => $req->service_id,
            'qr_code' => $qr_code,
            'appoint_date' => $ndate,
            'appoint_time' => $ntime,
            'dentist_id' => $req->dentist_id
        ]);

        return response()->json([
            'status' => 'saved'
        ],200);
    }


    public function update(Request $req, $id){
        $req->validate([
            'appointment_date' => ['required']
        ]);
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
        ],200);
    }

}
