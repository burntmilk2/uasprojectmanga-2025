<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manga;
use App\Models\Author;
use App\Models\Genre;

class MangaSeeder extends Seeder
{
    public function run()
    {
        $mangas = [
            [
                'title' => 'One Piece',
                'status' => 'ongoing',
            ],
            [
                'title' => 'Naruto',
                'status' => 'completed',
            ],
            [
                'title' => 'Attack on Titan',
                'status' => 'completed',
            ],
        ];

        foreach ($mangas as $data) {
            $manga = Manga::create([
                'title' => $data['title'],
                'synopsis' => fake()->paragraph(3),
                'cover_image' => 'https://via.placeholder.com/200x300.png?text=' . urlencode($data['title']),
                'status' => $data['status'],
                'published_at' => now()->subYears(rand(5, 20)),
            ]);

            // Random relasi author dan genre
            $manga->authors()->attach(Author::inRandomOrder()->take(rand(1, 2))->pluck('id'));
            $manga->genres()->attach(Genre::inRandomOrder()->take(rand(2, 4))->pluck('id'));
        }
    }
}
