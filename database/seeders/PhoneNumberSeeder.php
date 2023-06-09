<?php

namespace Database\Seeders;

use App\Models\PhoneNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhoneNumber::query()->updateOrCreate(
            [
                'country_id' => 99,
                'number' => '2652354583',
                'is_main' => 1,
            ]
        );
    }
}
