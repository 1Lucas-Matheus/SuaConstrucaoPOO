<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class avaliations extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('avaliations')->insert([
            ['id' => 1, 'avaliationType' => 'Neutro'],
            ['id' => 2, 'avaliationType' => 'Bom'],
            ['id' => 3, 'avaliationType' => 'Ruim'],
        ]);
    }
}
