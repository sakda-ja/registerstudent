<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /* ออกแบบตาราง ระดับชั้นมัธยมศึกษา 1 และ 4 เพื่อแยกหมวดหมู่ */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('class_name'); //หมวดหมู่ชื่อระดับชั้น 1 ,4
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
