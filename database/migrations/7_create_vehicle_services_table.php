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
       Schema::create('vehicle_services', function (Blueprint $table) {
            $table->id('id_vehicle_service');

            $table->foreignId('vehicle_id')
                ->constrained('vehicles','id_vehicle');

            $table->dateTime('service_date');

            $table->text('keterangan');

            $table->decimal('cost', 12,2);

            $table->tinyInteger('status')
                ->comment('1=Prepare, 2=Ongoing, 3=Complete')
                ->default(1);

            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_services');
    }
};
