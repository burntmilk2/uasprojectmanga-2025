<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $authors = [
            'Eiichiro Oda',
            'Masashi Kishimoto',
            'Hajime Isayama',
            'Koyoharu Gotouge',
            'Yoshihiro Togashi',
        ];

        foreach ($authors as $name) {
            Author::create([
                'name' => $name,
                'bio' => fake()->paragraph(),
            ]);
        }
    }
}
