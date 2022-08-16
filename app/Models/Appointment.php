<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';

    protected $fillable = ['user_id', 'service_id', 'qr_code', 'appoint_date', 'dentist_schedule_id',
        'dentist_id', 'appoint_status', 'is_notify'];



    public function user(){
        return $this->hasOne(User::class, 'user_id', 'user_id')
        ->leftJoin('provinces', 'users.province', 'provinces.provCode')
        ->leftJoin('cities', 'users.city', 'cities.citymunCode')
        ->leftJoin('barangays', 'users.barangay', 'barangays.brgyCode');
    }


    public function service(){
        return $this->hasOne(Service::class, 'service_id', 'service_id');
    }

    public function dentist(){
        return $this->hasOne(User::class, 'user_id', 'dentist_id');
    }

    public function dentist_schedule(){
        return $this->hasOne(DentistSchedule::class, 'dentist_schedule_id', 'dentist_schedule_id');
    }


}
