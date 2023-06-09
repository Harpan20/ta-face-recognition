<?php

namespace Database\Seeders;

use App\Models\Vision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vision::query()->updateOrCreate([
            'vision' => 'Memenuhi kebutuhan pelanggaan atas keamanan dari risiko bisnis dan kebutuhan untuk terus tumbuh dan menguntungkan melalui produk, jasa, dan layanan prima.'
        ]);
    }
}
