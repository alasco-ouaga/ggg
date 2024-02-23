<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('UPDATE re_projects SET views = FLOOR(rand() * 10000) + 1;');
    }
}
