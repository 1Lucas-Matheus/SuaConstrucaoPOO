<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'Name' => 'Adm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'Name' => 'Cliente', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'Name' => 'Pedreiro', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'Name' => 'Servente', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
