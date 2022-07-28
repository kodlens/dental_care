<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentService;


use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Auth;
use App\Models\DentistSchedule;


class BookNowController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $req){

        $user = Auth::user();
        
        $qr_code = substr(md5(time() . $user->lname . $user->fname), -8);
        $date =  $req->booking_date; //date and time
        $ndate = date("Y-m-d", strtotime($date)); //convert to date format UNIX
        //$ntime = date("H:i:s", strtotime($date)); //convert to date format UNIX
       // $txtTime = date("H:i A", strtotime($date));


        //check if schedule exist
        $isScheduled = Appointment::where('dentist_schedule_id', $req->dentist_schedule_id)
            ->where('appoint_date', $ndate)
            ->where('dentist_id', $req->dentist_id)
            ->exists();

        if($isScheduled){
            return response()->json([
                'status' => 'exist'
            ], 422);
        }

        $dentistSchedule = DentistSchedule::where('dentist_schedule_id', $req->dentist_schedule_id)
            ->first();


        $nTimeFrom = $dentistSchedule->from;
        $txtTime = date("H:i A", strtotime(now() .' '. $nTimeFrom)); //fomrat time with AM/PM for txt message

        $appointment = Appointment::create([
            'user_id' => $user->user_id,
            'service_id' => $req->service_id,
            'qr_code' => $qr_code,
            'appoint_date' => $ndate,
            'dentist_schedule_id' => $req->dentist_schedule_id,
            'dentist_id' => $req->dentist_id
        ]);

       
        if(env('ENABLE_SMS') > 0){
            
            try{ 
                $msg = 'Dear '.$user->lname.', '. $user->fname .'. This is Dental Care Services. Thank you for booking with us! Your time and date Schedule:('.$ndate.', '. $txtTime . '). Reference No. :'. $appointment->qr_code;
        
                Http::withHeaders([
                    'Content-Type' => 'text/plain'
                ])->post('http://'. env('IP_SMS_GATEWAY') .'/services/api/messaging?Message='.$msg.'&To='.$user->contact_no.'&Slot=1', []);
            }catch(Exception $e){} //just hide the error
            // AppointmentService::create([
            //     'appointment_id' => $appointment->appointment_id,
            //     'service_id' => $req->service['service_id']
            // ]);
        }
        

        return response()->json([
            'status' => 'saved'
        ],200);
    }

}
