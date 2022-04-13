<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Auth;


class BookNowController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $req){

        $user = Auth::user();
        
         $qr_code = substr(md5(time() . $user->lname . $user->fname), -8);

        $date =  $req->appointment_date; //date and time
        $ndate = date("Y-m-d", strtotime($date)); //convert to date format UNIX
        $ntime = date("H:i:s", strtotime($date)); //convert to date format UNIX

        Appointment::create([
            'user_id' => $user->user_id,
            'qr_code' => $qr_code,
            'appoint_date' => $ndate,
            'appoint_time' => $ntime,
            'dentist_id' => $req->dentist_id
        ]);

         return response()->json([
            'status' => 'saved'
        ],200);
    }

}
