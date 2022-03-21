<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthQuestion extends Model
{
    use HasFactory;


    protected $table = 'health_questions';
    protected $primaryKey = 'hquestion_id';


    protected $fillable = ['question'];


}
