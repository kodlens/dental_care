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

}
