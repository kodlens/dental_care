<?php

namespace App\Http\Controllers\Dentist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Service;
use Auth;



class DentistAppointmentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('dentist');

    }

    public function index(){
        $services = Service::orderBy('service', 'asc')->get();
        return view('dentist.dentist-appointment')
            ->with('services', $services);
    }

    public function getAppointments(Request $req){
        $user = Auth::user();

        $sort = explode('.', $req->sort_by);

        $data = DB::table('appointments as a')
            ->join('users as c', 'a.dentist_id', 'c.user_id')
            ->join('services as d', 'a.service_id', 'd.service_id')
            ->join('users as e', 'a.user_id', 'e.user_id')
            ->select('a.*', 'c.lname as dentist_lname', 'c.fname as dentist_fname', 'c.mname as dentist_mname', 'd.*', 'e.lname as user_lname', 
                'e.fname as user_fname', 'e.mname as user_mname', 'e.contact_no as user_contact_no')
            ->where('a.dentist_id', $user->user_id)
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }


}
