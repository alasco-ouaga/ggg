<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('programmingsearchs', function (Blueprint $table) {
            $table->foreignId("locality_id")->nullable()
                ->constrained("localities")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::table('programmingsearchs', function (Blueprint $table) {
        });
    }
};
