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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('id_vehicle');
            $table->string('nama_kendaraan');
            $table->string('jenis_kendaraan');
            $table->string('plat_nomor');
            $table->tinyInteger('status')
                ->comment('1=Available, 2=Booked, 3=Maintanance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
