<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TicketPrice;

class TicketPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketPrice::firstOrCreate([], [
            'adult_weekday_price' => 950,
            'adult_weekend_price' => 1100,
            'child_weekday_price' => 650,
            'child_weekend_price' => 850,
            'group_price' => 800,
            'group_min_people' => 5,
            'school_group_price' => 700,
        ]);
    }
}
