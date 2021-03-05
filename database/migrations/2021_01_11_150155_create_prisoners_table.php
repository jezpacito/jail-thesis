<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisoners', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->string('alias');
            $table->string('nationality');
            $table->string('place_of_birth');
            $table->string('gender');
            $table->date('birthdate');
            $table->longText('permanent_address')->nullable();
            $table->longText('previous_address')->nullable();
            $table->integer('age');
            $table->string('occupation');
            $table->enum('status', ['single','married','divorce','separated']);
            $table->string('interviewer');
            $table->longText('designation');
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
        Schema::dropIfExists('prisoners');
    }
}
