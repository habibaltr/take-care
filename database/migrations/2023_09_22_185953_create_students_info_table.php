<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_info', function (Blueprint $table) {
            $table->id();
            $table->char('academic_year');
            $table->char('st_id');
            $table->char('st_name');
            $table->string('roll')->nullable();
            $table->unsignedBigInteger('class_id')->unsigned();
            $table->unsignedBigInteger('sec_id')->unsigned();
            $table->char('gender')->comment('Male,Female,Others');
            $table->date('date_of_birth');
            $table->char('religion')->comment('Muslim,Hindu,Buddhist,Christian,Others');
            $table->char('mobile_no')->nullable();
            $table->char('email')->nullable();
            $table->char('blood_group')->nullable()->comment('A+, A-,B+,B-,AB+,AB-,O+,O-');
            $table->date('admission_date');
            $table->text('previous_institute')->nullable();
            $table->text('pressent_address');
            $table->text('permanent_address');
            $table->text('medical_history')->nullable();
            $table->text('quota')->nullable();
            $table->string('st_photo')->nullable();
            $table->tinyInteger('status')->default('1')->comment('0 = inactive,1= active');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sec_id')->references('id')->on('section')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_info');
    }
}
