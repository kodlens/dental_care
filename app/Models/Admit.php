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

}
