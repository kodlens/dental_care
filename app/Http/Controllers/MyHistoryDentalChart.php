<?php

namespace App\Http\Controllers;

use App\Models\AdmitService;
use Illuminate\Http\Request;

use App\Models\Admit;


class MyHistoryDentalChart extends Controller
{
    //



    public function index($admitid){

        $data = Admit::with(['patient'])->first();
        return view('my-history-dental-chart')
            ->with('admitid', $admitid)
            ->with('data', $data);
    }


    public function getAdmitServiceHistory(Request $req){

        return AdmitService::with('services', 'service_inventories')
            ->where('admit_id', $req->aid)
            ->where('tooth_id', $req->toothid)
            ->get();
    }
}
