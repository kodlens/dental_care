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

    public function getDentistItems(Request $req){

        $sort = explode('.', $req->sort_by);

        $data = Item::where('item_name', 'like', $req->itemname . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }


    public function store(Request $req){

        $req->validate([
            'item_id' => ['required'],
        ], $message = [
            'item_id.required' => ['Item is required. Please select item.']
        ]);

        ServiceInventory::create([
            'admin_service_id' => $req->admin_service_id,
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
        Item::destroy($id);
        return response()->json([
            'status' => 'deleted'
        ],200);
    }


}
