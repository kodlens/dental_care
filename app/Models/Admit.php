<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admit extends Model
{
    use HasFactory;


    protected $table = 'admits';
    protected $primaryKey = 'admit_id';


    protected $fillable = ['appointment_id',
        'patient_id', 'service_id',
        'qr_code', 'appoint_date', 'appoint_status',
        'dentist_id'
    ];

    public function service(){
        return $this->hasOne(Service::class, 'service_id', 'service_id');
    }

    public function dentist(){
        return $this->hasOne(User::class, 'user_id', 'dentist_id');
    }


    public function admit_services(){
        return $this->hasMany(AdmitService::class, 'admit_id', 'admit_id')
            //->join('services', 'services.service_id', 'admit_services.service_id')
            ->with(['services' => function($q){
                //$q->join('service_inventories.admit_service_id', 'admit_services.admit_service_id')
                $q->get();
            }])
            
            ->with(['service_inventories' => function($q){
                //$q->join('service_inventories.admit_service_id', 'admit_services.admit_service_id')
                $q->get();
            }]);
    }


    public function patient(){
        return $this->hasOne(User::class, 'user_id', 'patient_id')
            ->leftJoin('provinces', 'users.province', 'provinces.provCode')
            ->leftJoin('cities', 'users.city', 'cities.citymunCode')
            ->leftJoin('barangays', 'users.barangay', 'barangays.brgyCode');
    }




}
