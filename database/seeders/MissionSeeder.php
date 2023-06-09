<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mission::query()->updateOrCreate([
            'mission' => 'Memenuhi kebutuhan pelanggaan atas keamanan dari risiko bisnis dan kebutuhan untuk terus tumbuh dan menguntungkan melalui produk, jasa, dan layanan prima.'
        ]);
    }
}
