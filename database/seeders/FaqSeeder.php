<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'question' => 'Bagaimana sistem pembayaran produk Core Banking System?',
                'answer' => 'Jawaban',
            ],
            [
                'question' => 'Berapa lama waktu kontrak yang disepakati untuk produk Core Banking System?',
                'answer' => 'Jawaban',
            ],
            [
                'question' => 'Apakah core banking system dikelar15 sudah bisa laporan ke APOLO dan SLIK?',
                'answer' => 'Jawaban',
            ],
            [
                'question' => 'Apakah Multipilar menyediakan mobile apps?',
                'answer' => 'Jawaban',
            ],
            [
                'question' => 'Bagaimana kami menghubungi pihak multipilar, ketika ada pertanyaan terkait pengoperasian sistem atau permintaan fitur baru?',
                'answer' => 'Jawaban',
            ],
            [
                'question' => 'Apakah sistem yang multipilar kembangkan bisa diintegrasikan dengan SMS notification?',
                'answer' => 'Jawaban',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::query()->updateOrCreate([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
            ]);
        }
    }
}
