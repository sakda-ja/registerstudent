<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model //ชื่อไฟล์ Model
{
    use HasFactory;
    use SoftDeletes; //ฟังชั่นลบลงถังขยะ


    //กำหนดค่าจากแบบฟอร์มเพื่อบันทึกลงฐานข้อมูล ###สำคัญมาก
    protected $fillable = [
        'user_id',
        'class_name'
    ];


}
