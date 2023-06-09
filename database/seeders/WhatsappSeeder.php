<?php

namespace Database\Seeders;

use App\Models\Whatsapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhatsappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Whatsapp::query()->updateOrCreate([
            'country_id' => 99,
            'number' => '8121271144',
            'is_main' => 1,
        ]);
    }
}
