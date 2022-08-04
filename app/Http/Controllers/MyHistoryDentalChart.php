<?php

namespace App\Http\Controllers;

use App\Models\AdmitService;
use Illuminate\Http\Request;

class MyHistoryDentalChart extends Controller
{
    //



    public function index($admitid){
        return view('my-history-dental-chart')
            ->with('admitid', $admitid);
    }


    public function getAdmitServiceHistory(Request $req){

        return AdmitService::with('services')
            ->where('admit_id', $req->aid)
            ->where('tooth_id', $req->toothid)
            ->get();
    }
}
