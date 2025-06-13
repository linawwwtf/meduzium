<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'name' => 'Иван Иванов',
            'rating' => 5,
            'content' => 'Отличное место для хорошего проведения времени, рекомендую!',
        ]);

        Review::create([
            'name' => 'Светлана Петрова',
            'rating' => 4,
            'content' => 'Хорошее место, но есть небольшие недочеты.',
        ]);

        Review::create([
            'name' => 'Екатерина Васильева',
            'rating' => 5,
            'content' => 'Медузиум превзошел мои ожидания!',
        ]);
    }
}
