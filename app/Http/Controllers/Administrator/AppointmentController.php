<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
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
        return view('administrator.appointment');
    }

    public function getAppointments(Request $req){
        $sort = explode('.', $req->sort_by);

        $data = DB::table('appointments as a')
            ->join('dentists as c', 'a.dentist_id', 'c.dentist_id')
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
