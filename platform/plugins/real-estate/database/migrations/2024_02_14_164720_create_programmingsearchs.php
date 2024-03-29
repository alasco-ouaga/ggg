<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('programmingsearchs', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default("rent");
            $table->string('category')->nullable();
            $table->string('category_id')->nullable();
            $table->string('city')->nullable();
            $table->string('city_id')->nullable();
            $table->double('min_price')->nullable();
            $table->double('max_price')->nullable();
            $table->string('number_bedroom')->nullable();
            $table->string('number_bathroom')->nullable();
            $table->string('number_floor')->nullable();
            $table->string('found')->default(false);
            $table->string('nb_found')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programmingsearchs');
    }
};
