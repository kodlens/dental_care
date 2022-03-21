<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTrack extends Model
{
    use HasFactory;

    protected $table = 'appointment_tracks';
    protected $primaryKey = 'appointment_track_id';

    protected $fillable = ['appointment_id', 'office_id', 'time_out', 'remark'];


}
