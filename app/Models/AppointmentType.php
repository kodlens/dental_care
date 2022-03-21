<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentType extends Model
{
    use HasFactory;

    protected $table = 'appointment_types';

    protected $primaryKey = 'appointment_type_id';

    protected $fillable = ['office_id', 'appointment_type', 'cc_time', 'temp_sum', 'is_multiple'];

}
