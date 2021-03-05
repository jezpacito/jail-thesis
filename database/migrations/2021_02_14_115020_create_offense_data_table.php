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
            $table->string('crime_committed')->nullable();
            $table->string('criminal_case_no')->nullable();
            $table->string('trial_court')->nullable();
            $table->string('sentence_term')->nullable();
            $table->date('date_imprisonment')->nullable();
            $table->text('place_imprisonment')->nullable();
            $table->date('date_sentence_commence')->nullable();
            $table->text('prev_crim_record')->nullable();
            $table->date('date_release')->nullable();
            $table->string('sentence_by')->nullable();
            $table->text('sentence')->nullable();
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
