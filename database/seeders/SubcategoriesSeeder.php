<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            [
                'id'=>'1',
                'name'=>'Питание',
                'category_id'=>'1'

            ],
            [
                'id'=>'2',
                'name'=>'Спорт',
                'category_id'=>'1'

            ],
            [
                'id'=>'3',
                'name'=>'Анализы',
                'category_id'=>'1'

            ],
            [
                'id'=>'4',
                'name'=>'Покупки',
                'category_id'=>'1'

            ],
            [
                'id'=>'5',
                'name'=>'Выплаты, пособия',
                'category_id'=>'1'

            ],
            [
                'id'=>'6',
                'name'=>'Физическое развитие',
                'category_id'=>'2'

            ],
            [
                'id'=>'7',
                'name'=>'Прикорм',
                'category_id'=>'2'

            ],
            [
                'id'=>'8',
                'name'=>'Зубы',
                'category_id'=>'2'

            ],
            [
                'id'=>'9',
                'name'=>'Сон',
                'category_id'=>'2'

            ],
            [
                'id'=>'10',
                'name'=>'Развивающие занятия',
                'category_id'=>'3'

            ],
            [
                'id'=>'11',
                'name'=>'Меню',
                'category_id'=>'3'

            ],
            [
                'id'=>'12',
                'name'=>'Прогулки',
                'category_id'=>'3'

            ],
            [
                'id'=>'13',
                'name'=>'Воспитание',
                'category_id'=>'3'

            ]
        ]);
    }
}
