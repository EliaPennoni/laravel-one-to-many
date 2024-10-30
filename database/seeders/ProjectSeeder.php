<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\project;
use App\Models\Type;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(3);

            $randomType = Type::inRandomOrder()->first();

            Project::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'price' => $faker->randomFloat(2, 1, 999),
                'description' => $faker->paragraph(),
                'image' => $faker->imageUrl(640, 480, 'projects', true),
                'type_id' => $randomType->id,
            ]);
        }
    }
}
