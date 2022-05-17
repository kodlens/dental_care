<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
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
        return view('administrator.report.report-inventory');
    }
    public function getReportInventory(){
        return Item::all();
    }


}
