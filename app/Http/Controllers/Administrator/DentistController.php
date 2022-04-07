<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('administrator.dentist');
    }

    public function getDentists(Request $req){
        //this is for select box in appointment
        $sort = explode('.',$req->sort_by);
        $data = Dentist::where('lname', 'like', $req->lname . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);
        return $data;
    }



    public function loadOffices(){
        return Office::all();
    }


    public function show($id){
        return Office::find($id);
    }

    public function store(Request $req){
        $req->validate([
            'office_name' => ['required', 'unique:offices'],

        ]);

        Office::create([
            'office_name' => strtoupper($req->office_name),
        ]);

        return response()->json([
            'status' => 'saved'
        ],200);
    }


    public function update(Request $req, $id){
        $req->validate([
            'office_name' => ['required', 'unique:offices,office_name,' .$id. ',office_id'],
        ]);

        $data = Office::find($id);
        $data->office_name = strtoupper($req->office_name);
        $data->save();

        return response()->json([
            'status' => 'updated'
        ],200);
    }

    public function destroy($id){
        Office::destroy($id);
    }



}
