<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sources')->insert([
            [
                'nama'=>'Lainnya',
            ],
            [
                'nama'=>'Rumah Tangga',
            ],
            [
                'nama'=>'Pertanian',
            ],
            [
                'nama'=>'Industri',
            ],
            [
                'nama'=>'Sisa Bangunan',
            ],
        ]);
    }
}