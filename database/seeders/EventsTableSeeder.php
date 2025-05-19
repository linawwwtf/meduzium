<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Уникальная выставка "Медузы: жизнь под водой"',
                'description' => 'Знакомство с разнообразием медуз мирового океана',
                'type' => 'exhibition',
                'start_date' => Carbon::create(2023, 3, 15, 10, 0),
                'end_date' => Carbon::create(2023, 5, 15, 18, 0),
            ],
            [
                'title' => 'Мастер-класс по изучению медуз для детей',
                'description' => 'Интерактивный мастер-класс для детей 6-12 лет',
                'type' => 'masterclass',
                'start_date' => Carbon::create(2023, 4, 10, 11, 0),
                'end_date' => Carbon::create(2023, 4, 10, 13, 0),
            ],
            [
                'title' => 'Специальная лекция от ведущего биолога о медузах',
                'description' => 'Лекция доктора биологических наук о современных исследованиях медуз',
                'type' => 'lecture',
                'start_date' => Carbon::create(2023, 4, 20, 18, 0),
                'end_date' => Carbon::create(2023, 4, 20, 19, 30),
            ],
            [
                'title' => 'Фестиваль "Морская сказка: медузы и искусство"',
                'description' => 'Фестиваль, объединяющий науку и искусство',
                'type' => 'exhibition',
                'start_date' => Carbon::create(2023, 5, 3, 12, 0),
                'end_date' => Carbon::create(2023, 5, 3, 18, 0),
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
