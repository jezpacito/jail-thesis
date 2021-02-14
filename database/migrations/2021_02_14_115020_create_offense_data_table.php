<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffenseDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offense_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prisoner_id');
            $table->string('crime_committed');
            $table->string('criminal_case_no');
            $table->string('trial_court');
            $table->string('sentence_term');
            $table->date('date_imprisonment');
            $table->text('place_imprisonment');
            $table->date('date_sentence_commence');
            $table->text('prev_crim_record');
            $table->date('date_release');
            $table->string('sentence_by');
            $table->text('sentence');
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
        Schema::dropIfExists('offense_data');
    }
}
