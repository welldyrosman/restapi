<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('ktpno');
            $table->string('fullname');
            $table->string('bornplace');
            $table->timestamp('birddate');
            $table->string('gender');
            $table->string('phoneno');
            $table->string('email');
            $table->string('kkno');
            $table->string('religion');
            $table->string('education');
            $table->string('jobdesc');
            $table->string('partnername');
            $table->string('partnerphone');
            $table->string('address');
            $table->string('city');
            $table->string('maritalstatus');
            $table->string('password');
            $table->string('regrole');
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
        Schema::dropIfExists('patient');
    }
}
