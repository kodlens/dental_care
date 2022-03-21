<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';

    protected $fillable = ['appointment_type_id', 'appointment_user_id', 'app_date', 'app_time_from',
        'app_time_to', 'is_approve', 'visit_status'];
}
