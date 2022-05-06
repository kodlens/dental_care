<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInventory extends Model
{
    use HasFactory;
    

    protected $table = 'service_inventories';
    protected $primaryKey = 'service_inventory_id';
    //tobe continue
    protected $fillable = ['admin_service_id', 'item_id', 'remarks'];
}
