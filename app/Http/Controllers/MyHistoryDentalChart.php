<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyHistoryDentalChart extends Controller
{
    //



    public function index($admitid){
        return view('my-history-dental-chart')
            ->with('admitid', $admitid);
    }
}
