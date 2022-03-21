<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppClock extends Model
{
    use HasFactory;
    protected $table = 'app_clocks';
    protected $primaryKey = 'id';

    protected $fillable = ['start_time', 'end_time'];

}
