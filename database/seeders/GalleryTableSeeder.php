<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([1, 2, 3, 4, 5, 6] as $index) {
            Gallery::create([
                'image_url' => "storage/gallery/photo{$index}.jpg"
            ]);
        }
    }
}
