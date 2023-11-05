<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->string('sub_name');
            $table->string('sub_code');
            $table->tinyInteger('sub_type')->comment('1=General Subject,2=Group Subject,3=Religion Subject');
            $table->string('pass_mark');
            $table->string('written');
            $table->string('mcq');
            $table->string('practical');
            $table->tinyInteger('pass_type')->comment('1=part wise,2=total');
            $table->string('combined_sub');
            $table->tinyInteger('status')->comment('0=inactive,1=active');
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
        Schema::dropIfExists('subject');
    }
}
