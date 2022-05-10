<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmitService extends Model
{
    use HasFactory;


    protected $table = 'admit_services';
    protected $primaryKey = 'admit_service_id';

    protected $fillable = ['admit_id', 'service_id', 'tooth_id'];


    public function service_inventories(){
        return $this->hasMany(ServiceInventory::class, 'admit_service_id', 'admit_service_id');
    }

    public function services(){
        return $this->hasOne(Service::class, 'service_id', 'service_id');
    }

    public function teeth(){
        return $this->hasOne(Teeth::class, 'tooth_id', 'tooth_id');
    }





}
