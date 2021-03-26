<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id'=>'1',
                'name'=>'Беременность'
            ],
            [
                'id'=>'2',
                'name'=>'Дети до года'
            ],
            [
                'id'=>'3',
                'name'=>'Дети от 1 года до 3 лет'
            ]
        ]);
    }
}
