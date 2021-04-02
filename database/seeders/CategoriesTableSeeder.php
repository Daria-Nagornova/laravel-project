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
                'name'=>'Беременность',
                'description'=>'Беременность – это совершенно особенное состояние женщины. Будущей маме необходимо не только своевременно встать на учет и наблюдаться у специалиста, но и уделить немало времени самообразованию. Данное сообщество поможет вам найти единомышленников и множество полезной информации'
            ],
            [
                'id'=>'2',
                'name'=>'Дети до года',
                'description'=>'Развитие малышей на первом году жизни. Здоровье, питание, прикорм, покупки для ребенка и многие другие вопросы, на которые вы найдете ответы в данном сообществе.'
            ],
            [
                'id'=>'3',
                'name'=>'Дети от 1 года до 3 лет',
                'description'=>'Ребенок подрос, появились новые умелки и интересы. В этос сообществе вы сможете обсудить все, что касается здоровья, развития, психологии детей до 3х лет.'
            ]
        ]);
    }
}
