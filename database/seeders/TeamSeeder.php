<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'position_id' => 1,
                'name' => 'Arif Hidayat',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 2,
                'name' => 'Hamid Afandy',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 3,
                'name' => 'Fauzi Sofyan',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 4,
                'name' => 'Haris Maulana',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 5,
                'name' => 'M. Ammar Abdurrahman',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 6,
                'name' => 'Diki Husna N.',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 7,
                'name' => 'Ahmad Burhanudin',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 7,
                'name' => 'Adi Sumantri',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 8,
                'name' => 'Jajang Nurjaman',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
            [
                'position_id' => 7,
                'name' => 'Adi Sumantri',
                'image' => 'https://source.unsplash.com/random/216x287'
            ],
        ];

        foreach ($teams as $team) {
            Team::query()->updateOrCreate([
                'position_id' => $team['position_id'],
                'name' => $team['name'],
                'image' => $team['image'],
            ]);
        }
    }
}
