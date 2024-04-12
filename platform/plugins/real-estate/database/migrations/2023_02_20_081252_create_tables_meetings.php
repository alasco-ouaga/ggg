<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->string('mode');
            $table->string('tool');
            $table->string('link');
            $table->date('date');
            $table->time('time');
            $table->string('locality');
            $table->text('comment')->nullable();
            $table->string('agent_id');
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
