<?php

namespace App\Http\Controllers;

use App\Models\Admit;
use App\Models\AdmitService;


use App\Models\Appointment;
use Illuminate\Http\Request;

class PrintMedicalController extends Controller
{
    //

    public function medicalRecord($id){
        $appointment_id = $id;

        $appointmentData = Appointment::with(['dentist_schedule', 'dentist', 'service', 'user'])
            ->where('appointment_id', $id)->first();

        // $admitServices = \DB::table('admit_services as a')
        //     ->join('admits as b', 'a.admit_id', 'b.admit_id')
        //     ->join('appointments as c', 'b.appointment_id', 'c.appointment_id')
        //     ->join('services as d', 'a.service_id', 'd.service_id')
        //     ->with(['service_inventories' => function($q){

        //         $q->where('service_inventories.admit_service_id', 'admit_services.admit_service_id')
        //             ->get();
        //     }])
        //     ->where('c.appointment_id', $id)
        //     ->select('a.*', 'b.dentist_id', 'c.appointment_id', 'd.service')
        //     ->get();

        $admitServices = AdmitService::with(['admit', 'services','service_inventories'])
            ->whereHas('admit', function ($q) use ($id){
                $q->where('appointment_id', $id);
            })
            ->get();

        //return $admitServices;

        //return $admitServices;


        return view('print-medical-record')
            ->with('appointmentData', $appointmentData)
            ->with('admitServices', $admitServices);
    }




    public function medicalRecordInDentist($admitId){

        $admitData = Admit::with(['service', 'dentist', 'admit_services', 'patient'])
            ->where('admit_id', $admitId)->first();

            //return $admitData;
            //return $admitData;

        // $admitServices = \DB::table('admit_services as a')
        //     ->join('admits as b', 'a.admit_id', 'b.admit_id')
        //     ->join('appointments as c', 'b.appointment_id', 'c.appointment_id')
        //     ->join('services as d', 'a.service_id', 'd.service_id')
        //     ->with(['service_inventories' => function($q){

        //         $q->where('service_inventories.admit_service_id', 'admit_services.admit_service_id')
        //             ->get();
        //     }])
        //     ->where('c.appointment_id', $id)
        //     ->select('a.*', 'b.dentist_id', 'c.appointment_id', 'd.service')
        //     ->get();

        // $admitServices = Admit::with(['admit_services', 'admit' =>
        //     function($q) use ($id){
        //         $q->where('appointment_id', $id)->get();
        //     }
        // , 'service_inventories'])
        //     ->get();



        return view('dentist.print-patient-medical-record')
            ->with('admitData', $admitData);
    }

}
