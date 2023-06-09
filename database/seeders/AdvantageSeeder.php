<?php

namespace Database\Seeders;

use App\Models\Advantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advantages = [
            // mobile
            [
                'name' => 'Sesuai Aturan',
                'description' => 'no description',
                'icon' => 'https://lh5.googleusercontent.com/EvzBI7DjxMgjbQfsi3RKKAggj0S4Z5DXUPg-EeaAhJpxA8x_vJQtLZGwal9_DWkKYhA=w2400',
            ],
            [
                'name' => 'Mudah Digunakan',
                'description' => 'no description',
                'icon' => 'https://lh4.googleusercontent.com/jpta2uxaMoidDudyztV4Ul8pMGTJB0ISTSPvuVJn116hp_0RNHG0zdqyOToBQyPHWys=w2400',
            ],
            [
                'name' => 'Aplikasi Berbasis Android',
                'description' => 'no description',
                'icon' => 'https://lh3.googleusercontent.com/twiJrDzIJayInY6texfWjfpZ_oyhPLDXr3XYz1LeFkw62mLzq5wE5ERptkmhizO6Iw8=w2400',
            ],
            [
                'name' => 'Cakupan Layanan Kantor Cabang',
                'description' => 'no description',
                'icon' => 'https://lh3.googleusercontent.com/twiJrDzIJayInY6texfWjfpZ_oyhPLDXr3XYz1LeFkw62mLzq5wE5ERptkmhizO6Iw8=w2400',
            ],
            [
                'name' => 'Multi - User',
                'description' => 'no description',
                'icon' => 'https://lh3.googleusercontent.com/twiJrDzIJayInY6texfWjfpZ_oyhPLDXr3XYz1LeFkw62mLzq5wE5ERptkmhizO6Iw8=w2400',
            ],
            [
                'name' => 'Transaksi Secara Realtime',
                'description' => 'no description',
                'icon' => 'https://lh3.googleusercontent.com/4T8XJ8uql--_LhAcIXkbYVTkbQnrNWjN-GqbZcmeXI066RgrqXhP4ovAvg4prnwMxms=w2400',
            ],
            [
                'name' => 'Fitur Otorisasi',
                'description' => 'no description',
                'icon' => 'https://lh3.googleusercontent.com/twiJrDzIJayInY6texfWjfpZ_oyhPLDXr3XYz1LeFkw62mLzq5wE5ERptkmhizO6Iw8=w2400',
            ],
            [
                'name' => 'Fitur Laporan Realtime',
                'description' => 'no description',
                'icon' => 'https://lh4.googleusercontent.com/6MgcwD_SU-Bd0B9iFWCoB6zEtVrfUNtm7wfXwNA6DcIu3k6o_MFKsDZnAvGz22Fi9Zc=w2400',
            ],
            [
                'name' => 'Fitur Keamanan Canggih',
                'description' => 'no description',
                'icon' => 'https://lh3.googleusercontent.com/twiJrDzIJayInY6texfWjfpZ_oyhPLDXr3XYz1LeFkw62mLzq5wE5ERptkmhizO6Iw8=w2400',
            ],
            // BMT BPR LKM
            [
                'name' => 'Aplikasi Berbasis Web',
                'description' => 'no description',
                'icon' => 'https://lh5.googleusercontent.com/LbsYt0MdRml1BsJOHF7vwsx6Fjye9NFPLivJAgG5e6YX03T6NnlH34LDFn5xpKo_mlg=w2400',
            ],
            [
                'name' => 'Solusi Perbankan yang End-to-End',
                'description' => 'no description',
                'icon' => 'https://lh3.googleusercontent.com/67FbzKH4uSSsPrFAnUuLExfrHRmhs32Z2jiQdFcDhGdsE-ePeIyC9os1rv-8cy3MmmE=w2400',
            ],
            [
                'name' => 'Adaptif',
                'description' => 'no description',
                'icon' => 'https://lh5.googleusercontent.com/CEKJo-DqwBsuU_d7oZDI1AX-RJdNtY8z6pvjdziDFwhewQsRWahQj1qCmCA0Nxvq-4k=w2400',
            ],
            [
                'name' => 'Standar APU PPT',
                'description' => 'no description',
                'icon' => 'https://lh5.googleusercontent.com/g4fMnsXGs3_hfPnlqpF65FTneWFTytZT0p3Vw844e2q_p164QTTElI91ANPejOHZ7rA=w2400',
            ],
            [
                'name' => 'Standar SAK ETAP',
                'description' => 'no description',
                'icon' => 'https://lh3.googleusercontent.com/Ht8KaGTJcOi6NOem5kcqlzOcL7i8nbMc7bD3BG5httVh0aI-DwEUrzqnOwpp832tYyA=w2400',
            ],
        ];

        foreach ($advantages as $advantage) {
            Advantage::query()->updateOrCreate([
                'name' => $advantage['name'],
                'description' => $advantage['description'],
                'icon' => $advantage['icon'],
            ]);
        }
    }
}
