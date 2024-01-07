<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'clean'
            ]);
        DB::table('tags')->insert([
            'name' => 'distortion'
            ]);
        DB::table('tags')->insert([
            'name' => 'compressor'
            ]);
        DB::table('tags')->insert([
            'name' => 'equalizer'
            ]);
        DB::table('tags')->insert([
            'name' => 'filter'
            ]);
        DB::table('tags')->insert([
            'name' => 'moduration'
            ]);
        DB::table('tags')->insert([
            'name' => 'pitchshifter'
            ]);
        DB::table('tags')->insert([
            'name' => 'reverb'
            ]);
    }
}
