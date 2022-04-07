<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id');
            $table->string('qr_ref')->nullable();
            $table->date('appoint_date')->nullable();
            $table->time('appoint_time')->nullable();
            $table->unsignedBigInteger('dentist_id')->nullable();
            $table->foreign('dentist_id')->reference('dentist_id')->on('dentists');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
