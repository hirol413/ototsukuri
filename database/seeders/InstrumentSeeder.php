<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instruments')->insert([
            'name' => 'guitar'
            ]);
        DB::table('instruments')->insert([
            'name' => 'bass'
            ]);
        DB::table('instruments')->insert([
            'name' => 'etc'
            ]);
    }
}
