<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            [
                'id'=>'1',
                'name'=>'Елена Иванова',
                'description'=>'Врач высшей категории. Опыт работы 18 лет.',
                'specialisation_id'=>'1',
                'user_id'=>'2',
                'image'=>'images/2/i9F1IwhUqVd3bEiHvcMR9n6K8IyVOvcXAbsneP4C.jpg'
            ],
            [
                'id'=>'2',
                'name'=>'Алексей Смирнов',
                'description'=>'Врач высшей категории. Опыт работы 21 год.',
                'specialisation_id'=>'1',
                'user_id'=>'3',
                'image'=>'images/2/esIGl8OwPxhG6H0pqYLCLFlegrO4mzi3blm3FAbx.jpg'
            ],
            [
                'id'=>'3',
                'name'=>'Евгений Кривов',
                'description'=>'Врач первой категории. Опыт работы 15 лет.',
                'specialisation_id'=>'1',
                'user_id'=>'4',
                'image'=>'images/2/esIGl8OwPxhG6H0pqYLCLFlegrO4mzi3blm3FAbx.jpg'
            ],
            [
                'id'=>'4',
                'name'=>'Ирина Семина',
                'description'=>'Врач первой категории. Опыт работы 13 лет.',
                'specialisation_id'=>'1',
                'user_id'=>'5',
                'image'=>'images/2/i9F1IwhUqVd3bEiHvcMR9n6K8IyVOvcXAbsneP4C.jpg'
            ],
            [
                'id'=>'5',
                'name'=>'Анна Первова',
                'description'=>'Врач высшей категории. Опыт работы 18 лет.',
                'specialisation_id'=>'2',
                'user_id'=>'6',
                'image'=>'images/2/i9F1IwhUqVd3bEiHvcMR9n6K8IyVOvcXAbsneP4C.jpg'
            ],
            [
                'id'=>'6',
                'name'=>'Ольга Кривонос',
                'description'=>'Врач второй категории. Опыт работы 3 года.',
                'specialisation_id'=>'2',
                'user_id'=>'7',
                'image'=>'images/2/i9F1IwhUqVd3bEiHvcMR9n6K8IyVOvcXAbsneP4C.jpg'
            ],
            [
                'id'=>'7',
                'name'=>'Игорь Дьяков',
                'description'=>'Врач первой категории. Опыт работы 9 лет.',
                'specialisation_id'=>'2',
                'user_id'=>'8',
                'image'=>'images/2/esIGl8OwPxhG6H0pqYLCLFlegrO4mzi3blm3FAbx.jpg'
            ],
            [
                'id'=>'8',
                'name'=>'Оксана Крылова',
                'description'=>'Врач первой категории. Опыт работы 12 лет.',
                'specialisation_id'=>'3',
                'user_id'=>'2',
                'image'=>'images/2/i9F1IwhUqVd3bEiHvcMR9n6K8IyVOvcXAbsneP4C.jpg'
            ],
            [
                'id'=>'9',
                'name'=>'Валентина Лещенко',
                'description'=>'Врач высшей категории. Опыт работы 24 года.',
                'specialisation_id'=>'3',
                'user_id'=>'9',
                'image'=>'images/2/i9F1IwhUqVd3bEiHvcMR9n6K8IyVOvcXAbsneP4C.jpg'
            ],
            [
                'id'=>'10',
                'name'=>'Светлана Рыжкова',
                'description'=>'Врач второй категории. Опыт работы 5 лет.',
                'specialisation_id'=>'3',
                'user_id'=>'10',
                'image'=>'images/2/i9F1IwhUqVd3bEiHvcMR9n6K8IyVOvcXAbsneP4C.jpg'
            ],
        ]);

    }
}
