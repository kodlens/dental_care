<?php

namespace App\Http\Controllers\Dentist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DentistSchedule;

use Auth;

class DentistScheduleContoller extends Controller
{
    //


    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        return view('dentist.dentist-schedule')
            ->with('id', $user->user_id);
    }

    public function getDentistSchedules($id){
        return DentistSchedule::where('user_id', $id)->get();
    }

    public function store(Request $req){

        return $req;

        $req->validate([
            'user_id' => ['required']
        ]);
        $user = Auth::user();
        $data = DentistSchedule::create([
            'user_id' => $user->user_id,
            'from' => $nFrom,
            'to' => $nTo
        ]);


        return response()->json([
            'status' => 'saved'
        ], 200);

    }

}
