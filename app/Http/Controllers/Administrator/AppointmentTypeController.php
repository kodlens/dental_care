<?php

namespace App\Http\Controllers\Administrator;

use App\Models\AppointmentType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentTypeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        return view('administrator.appointment-type');
    }

    public function getAppointmentTypes(Request $req){
        $sort = explode('.', $req->sort_by);

        $data = \DB::table('appointment_types as a')
            ->join('offices as b', 'a.office_id', 'b.office_id')
            ->where('a.appointment_type', 'like', $req->type . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }

    public function show($id){
        return \DB::table('appointment_types as a')
            ->join('offices as b', 'a.office_id', 'b.office_id')
            ->where('a.appointment_type_id', $id)
            ->get();
    }



    public function store(Request $req){
        $req->validate([
            'office_id' => ['required'],
            'appointment_type' => ['required', 'max:100', 'string', 'unique:appointment_types'],
            'cc_time' => ['required'],
            'max_multiple' => ['required']
        ]);

        AppointmentType::create([
            'office_id' => $req->office_id,
            'appointment_type' => strtoupper($req->appointment_type),
            'cc_time' => $req->cc_time,
            'max_multiple' => $req->max_multiple
        ]);

        return response()->json([
            'status' => 'saved'
        ],200);
    }

    public function update(Request $req, $id){
        $validate = $req->validate([
            'office_id' => ['required'],
            'appointment_type' => ['required', 'max:100', 'string', 'unique:appointment_types,appointment_type,' .$id .',appointment_type_id'],
            'cc_time' => ['required']
        ]);

        $data = AppointmentType::find($id);
        $data->office_id = $req->office_id;
        $data->appointment_type = strtoupper($req->appointment_type);
        $data->cc_time = $req->cc_time;
        $data->max_multiple = $req->max_multiple;
        $data->save();

        return response()->json([
            'status' => 'updated'
        ],200);
    }

    public function destroy($id){
        AppointmentType::destroy($id);
    }

}
