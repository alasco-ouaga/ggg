<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('localities', function (Blueprint $table) {
            $table->foreignId("city_id")
                ->constrained("cities")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::table('districts', function (Blueprint $table) {
        });
    }
};
