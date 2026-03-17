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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id('id_approval');

            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('approver');

            $table->integer('level'); // level 1 supervisor, level 2 manager

            $table->tinyInteger('status')
                ->comment('1=Pending, 2=Approved, 3=Rejected');

            $table->foreign('booking_id')
                ->references('id_booking')
                ->on('bookings')
                ->onDelete('cascade');

            $table->foreign('approver')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
