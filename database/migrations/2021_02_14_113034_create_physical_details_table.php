<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prisoner_id');
            $table->string('height');
            $table->string('weight');
            $table->string('build');
            $table->string('eyes');
            $table->string('hair');
            $table->string('complexion');
            $table->string('religion');
            $table->string('nearest_kin');
            $table->string('address_nearest_kin');
            $table->string('bertillon_marks');
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
        Schema::dropIfExists('physical_details');
    }
}
