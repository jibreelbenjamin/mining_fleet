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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id_booking');

            $table->unsignedBigInteger('requested_by');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('driver_id');

            $table->string('tujuan');

            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');

            $table->tinyInteger('status')
                ->comment('1=Pending, 2=Approved, 3=Rejected, 4=Complete');

            $table->foreign('requested_by')
                ->references('id_user')
                ->on('users');

            $table->foreign('vehicle_id')
                ->references('id_vehicle')
                ->on('vehicles');

            $table->foreign('driver_id')
                ->references('id_driver')
                ->on('drivers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
