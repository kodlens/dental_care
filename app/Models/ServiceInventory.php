<?php

namespace App\Models;


// use Carbon\Carbon;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInventory extends Model
{
    use HasFactory;


    protected $table = 'service_inventories';
    protected $primaryKey = 'service_inventory_id';
    //tobe continue
    protected $fillable = ['admit_service_id', 'item_id', 'tooth_id', 'use_qty', 'remarks'];

    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

    // public function getUpdatedAtAttribute($date)
    // {
    //     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

}
