<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_id');
            $table->string('service_prefix');
            $table->string('service_namelastname');
            $table->string('service_dateofbirth');
            $table->string('service_origin');
            $table->string('service_nationality');
            $table->string('service_religion');
            $table->string('service_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
