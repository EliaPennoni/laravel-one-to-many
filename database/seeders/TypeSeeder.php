<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// models
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Alltypes = [
            'html',
            'CSS',
            'javascript',
            'Vue',
            'Laravel',
            'Bootstrap',
            'MySQl',
            'PHP',
        ];

        foreach ($Alltypes as $Singletype) {
            $type = Type::create([
                'name' => $Singletype,
                'slug' => strtolower(str_replace(' ', '-', $Singletype)),
            ]);
        }
    }
}
