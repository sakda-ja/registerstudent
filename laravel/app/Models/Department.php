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

//Fn นี้จะใช้ต่อเมื่อต้องการเรียกข้อมูลผ่านโมเดล  ใช้หรือไม่ก็ได้
    public function user(){
        return $this->hasOne(User::class , 'id' , 'user_id');
    }

}
