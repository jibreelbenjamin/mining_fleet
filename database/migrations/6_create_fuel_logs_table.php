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
        Schema::create('fuel_logs', function (Blueprint $table) {
            $table->id('id_fuel_log');

            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('vehicle_id');

            $table->decimal('liter', 10,2);
            $table->decimal('harga_per_liter', 10,2);
            $table->decimal('total', 12,2);

            $table->timestamp('tanggal');

            $table->foreign('booking_id')
                ->references('id_booking')
                ->on('bookings');

            $table->foreign('vehicle_id')
                ->references('id_vehicle')
                ->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_logs');
    }
};
