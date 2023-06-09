<?php

namespace Database\Seeders;

use App\Models\Excellence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExcellenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $excellences = [
            [
                'name' => 'Andal',
                'description' => 'Produk dan layanan kami dapat diandalkan yang dibuktikan dengan pengalaman di industri keuangan selama lebih dari 13 tahun'
            ],
            [
                'name' => 'Adaptif',
                'description' => 'Produk kami adaptif terhadap perubahan regulasi maupun kebutuhan instansi dan nasabah sehingga dapat dikembangkan dengan sangat adaptif terhadap kebutuhan'
            ],
            [
                'name' => 'Support 24 Jam',
                'description' => 'Kami memberikan support 24/7 melalui IT Support kami untuk membantu jika terjadi keluhan atau kendala saat menggunakan sistem kami.'
            ]
        ];

        foreach ($excellences as $excellence) {
            Excellence::query()->updateOrCreate([
                'name' => $excellence['name'],
                'description' => $excellence['description'],
            ]);
        }
    }
}
