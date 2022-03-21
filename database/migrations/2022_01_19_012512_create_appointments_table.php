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
            $table->unsignedBigInteger('appointment_type_id');
            $table->foreign('appointment_type_id')->references('appointment_type_id')->on('appointment_types');
            $table->unsignedBigInteger('appointment_user_id');
            $table->foreign('appointment_user_id')->references('user_id')->on('users');
            $table->date('app_date')->nullable();
            $table->time('app_time_from')->nullable();
            $table->time('app_time_to')->nullable();
            $table->tinyInteger('is_approved')->default(0);
            $table->string('visit_status')->nullable();

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
