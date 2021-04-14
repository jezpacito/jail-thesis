<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJailGuardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jail_guards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('address')->nullable();
            $table->string('contact_no')->nullable();
            // $table->string('finger_print')->nullable();
              //new db
            $table->double('serialnumber')->nullable();
            $table->integer('fingerprint_id')->nullable();
            $table->integer('fingerprint_select')->nullable();
            $table->date('date')->nullable();
            $table->time('timein')->nullable();
            $table->integer('del_fingerid')->nullable();
            $table->integer('add_fingerid')->nullable();
 
          
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
        Schema::dropIfExists('jail_guards');
    }
}
