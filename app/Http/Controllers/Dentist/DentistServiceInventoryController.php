<?php

namespace App\Http\Controllers\Dentist;

use App\Http\Controllers\Controller;
use App\Models\ServiceInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Item;


class DentistServiceInventoryController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $req){
        return view('dentist.dentist-service-log-inv')
            ->with('serviceid', $req->serviceid);
    }



    public function show($id){
        return Item::find($id);
    }

    public function getServiceInventories($admitServiceId){
        $data = ServiceInventory::where('admit_service_id', $admitServiceId)
            ->get();
        return $data;
    }


    public function store(Request $req){

        $req->validate([
            'item_id' => ['required'],
        ], $message = [
            'item_id.required' => ['Item is required. Please select item.']
        ]);

        ServiceInventory::create([
            'admit_service_id' => $req->admit_service_id,
            'item_id' => $req->item_id,
            'tooth_id' => $req->tooth_id,
            'remarks' => $req->remarks
        ]);

        return response()->json([
            'status' => 'saved'
        ],200);
    }

    public function update(Request $req, $id){

        $req->validate([
            'item_name' => ['required', 'unique:items,item_name,'. $id .',item_id']
        ]);

        $data = Item::find($id);
        $data->item_name = strtoupper($req->item_name);
        $data->save();

        return response()->json([
            'status' => 'updated'
        ], 200);
    }



    public function destroy($id){
        ServiceInventory::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ],200);
    }


}
