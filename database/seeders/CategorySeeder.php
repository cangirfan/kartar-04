<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Kerja Bakti',
            '17 Agustus',
            'Santunan',
            'Olahraga',
            'Event Pemuda',
        ];

        foreach ($categories as $index => $name) {
            Category::updateOrCreate(
                ['name' => $name],
                [
                    'slug' => Str::slug($name),
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}
