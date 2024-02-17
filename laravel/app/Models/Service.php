<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Barryvdh\DomPDF\Facade\Pdf;

class Service extends Model
{
    use HasFactory;



    //protected $table = 'services';  //mapping กับฐานข้อมูลจริงที่เติม s  ชื่อ registers

    protected $fillable = [
        'service_id',
        'service_prefix',
        'service_namelastname',
        'service_dateofbirth',
        'service_origin',
        'service_nationality',
        'service_religion',
        'service_image'
    ];
}




