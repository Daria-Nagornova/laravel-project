<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SpecialisationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialisations')->insert([
            [
                'id'=>'1',
                'name'=>'Педиатр'
            ],
            [
                'id'=>'2',
                'name'=>'Невропатолог'
            ],
            [
                'id'=>'3',
                'name'=>'Психолог'
            ]
        ]);
    }
}
