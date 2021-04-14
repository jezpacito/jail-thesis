<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJailGuardLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jail_guard_logs', function (Blueprint $table) {
            $table->id();
            $table->string('serialnumber')->nullable();
            $table->integer('fingerprint_id')->nullable();
            $table->date('checkindate')->nullable();
            $table->time('timein')->nullable();
            $table->time('timeout')->nullable();
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
        Schema::dropIfExists('jail_guard_logs');
    }
}
