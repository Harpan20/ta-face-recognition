<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'name' => 'Director'
            ], // 1
            [
                'name' => 'Business Development & Marketing Manager'
            ], // 2
            [
                'name' => 'Business Development & Marketing Staff'
            ], // 3
            [
                'name' => 'Head of IT'
            ], // 4
            [
                'name' => 'Fullstack Developer'
            ], // 5
            [
                'name' => 'Head of IT Support'
            ], // 6
            [
                'name' => 'IT Support'
            ], // 7
            [
                'name' => 'Occupation'
            ], // 8
        ];

        foreach ($positions as $position) {
            Position::query()->updateOrCreate([
                'name' => $position['name'],
            ]);
        }
    }
}
