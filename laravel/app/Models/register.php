<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    use HasFactory;

    protected $table = 'registers';  //mapping กับฐานข้อมูลจริงที่เติม s  ชื่อ registers
}
