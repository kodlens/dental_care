<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('administrator.report.report-track');
    }

    public function reportInventory(){
        $items = Item::all();
        return view('administrator.report.report-inventory')
            ->with('items', $items);
    }



    //appointment
    public function reportAppointment(){
        return view('administrator.report.report-appointment');
    }

    public function getReportAppointment(Request $req){
        $from = $req->from;
        $to = $req->to;


        $nfrom = date("Y-m-d", strtotime($from)); //convert to date format UNIX
        $nto = date("Y-m-d", strtotime($to)); //convert to date format UNIX


        $data = Appointment::whereBetween('appoint_date', [$nfrom, $nto])
            ->get();

        return $data;
    }



}
