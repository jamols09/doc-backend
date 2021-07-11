<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('file_name');
            $table->integer('patient_id');
            $table->integer('medicine_id');
            $table->integer('prescription_template_id');
            $table->string('weight_type');
            $table->string('weight_amount');
            $table->integer('interval');
            $table->string('frequency');
            $table->string('medicine_amount');
            $table->string('additional_info');
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
        Schema::dropIfExists('prescriptions');
    }
}
