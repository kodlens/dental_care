<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_types', function (Blueprint $table) {
            $table->id('appointment_type_id');
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('office_id')->on('offices');

            $table->string('appointment_type');
            $table->integer('cc_time')->default(0);
            $table->integer('temp_sum')->default(0);
            $table->tinyInteger('is_multiple')->default(0);
            $table->integer('max_multiple')->default(10);
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('appointment_types');
    }
}
