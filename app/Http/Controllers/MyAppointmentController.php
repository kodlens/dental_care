<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;



class MyAppointmentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('my-appointment');
    }

    public function getMyAppointments(Request $req){
        $sort = explode('.', $req->sort_by);
        $user = Auth::user();


        $data = DB::table('appointments as a')
            ->join('dentists as b', 'a.dentist_id', 'b.dentist_id')
            ->select('a.appointment_id', 'a.user_id', 'a.appoint_date', 'a.appoint_time', 'a.dentist_id', 'a.appoint_status',
                'b.lname as dentist_lname', 'b.fname as dentist_fname', 'b.mname as dentinst_mname',
                'c.lname as user_lname', 'c.fname as user_fname', 'c.mname as user_mname', 'c.sex as user_sex', 'c.contact_no as user_contact_no')
            ->join('users as c', 'a.user_id', 'c.user_id')
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


}
