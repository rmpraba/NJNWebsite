<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_centres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('centre_id');
            $table->string('centre_name');
            $table->string('district_id');
            $table->string('upload_pic');
            $table->string('street'); 
            $table->string('district'); 
            $table->string('state');
            $table->string('pin_code');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('landline');
            $table->string('website_id');
            $table->string('pan_card'); 
            $table->string('pan_card_image');
            $table->string('gst');
            $table->string('gst_image');
            $table->string('training_start');
            $table->string('training_end');
            $table->string('adhar_card');
            $table->string('adhar_card_image');
            $table->string('centre_type');
            $table->string('training');
            $table->string('centre_status');
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
        Schema::dropIfExists('training_centres');
    }
}