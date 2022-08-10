<?php

namespace App\Http\Controllers;

use App\Models\Admit;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PrintMedicalController extends Controller
{
    //

    public function medicalRecord($id){

        $appointmentData = Appointment::with(['dentist_schedule', 'dentist', 'service', 'user'])
            ->where('appointment_id', $id)->first();


        $admitData = Admit::with(['service', 'dentist'])
            ->first();

        $admitServices = \DB::table('admit_services as a')
            ->join('admits as b', 'a.admit_id', 'b.admit_id')
            ->join('appointments as c', 'b.appointment_id', 'c.appointment_id')
            ->where('c.appointment_id', $id)
            ->get();

        return $admitServices;


        return view('print-medical-record');
    }
}
