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
        Schema::create('programming_searchs', function (Blueprint $table) {
            $table->id();
            $table->string('type_name')->nullable();
            $table->string('keys')->nullable();
            $table->string('find')->default("no");
            $table->string('city_name')->nullable();
            $table->string('city_id')->nullable();
            $table->double('min_price')->nullable();
            $table->double('max_price')->nullable();
            $table->string('number_bedroom')->nullable();
            $table->string('number_bathroom')->nullable();
            $table->string('number_floor')->nullable();
            $table->string('custumer_id')->nullable();
            $table->string('category_id')->nullable();
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
        Schema::dropIfExists('programming_searchs');
    }
};
