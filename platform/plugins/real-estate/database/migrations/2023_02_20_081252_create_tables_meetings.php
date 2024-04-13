<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->string('mode');
            $table->string('tool')->nullable();
            $table->string('link')->nullable();
            $table->date('date');
            $table->time('time');
            $table->string('locality');
            $table->text('comment')->nullable();
            $table->string('agent_id');
            $table->string('property_id');
            $table->string('agent_first_name');
            $table->string('agent_last_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meetings');
    }
};
