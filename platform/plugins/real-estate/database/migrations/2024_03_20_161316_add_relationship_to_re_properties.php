<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('re_properties', function (Blueprint $table) {
            $table->foreignId("locality_id")->nullable()
                ->constrained("localities")
                ->onUpdate("restrict")
                ->onDelete("restrict");
        });
    }

    public function down()
    {
        Schema::table('re_properties', function (Blueprint $table) {
        });
    }
};
