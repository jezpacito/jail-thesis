<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCottagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cottages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nightRate');
            $table->integer('dayRate');
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->boolean('isNightAvailable')->default(true);
            $table->boolean('isDayAvailable')->default(true);
            $table->boolean('isVacant')->default(true);
            $table->unsignedBigInteger('category_id');
            $table->integer('no_of_person')->default(7);
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
        Schema::dropIfExists('cottages');
    }
}
