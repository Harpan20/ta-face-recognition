<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonies = [
            [
                'name' => 'Fauzi Sofyan',
                'position' => 'Digital Analyst',
                'origin' => 'BPR DIORAMA',
                'testimony' => 'Pelayanan sangat cepat & hasil sesuai dengan brief yang diinginkan. Pengalaman kerja sama yang cukup menyenangkan, kami mendapat banyak masukan dari tim profesional.',
                'image' => 'https://source.unsplash.com/random/80x80',
            ],
            [
                'name' => 'Budi Gautama',
                'position' => 'Chief Marketing Officer',
                'origin' => 'PT. Niaga Global Interdimensional',
                'testimony' => 'Saya telah menggunakan layanan core banking sistem ini selama beberapa bulan dan sangat terkesan dengan kinerjanya. Transaksi yang cepat dan mudah, aksesibilitas yang baik, dan dukungan pelanggan yang responsif sangat memudahkan saya dalam mengelola keuangan pribadi. Saya sangat merekomendasikan layanan ini kepada siapapun yang mencari solusi perbankan yang andal dan canggih.',
                'image' => 'https://source.unsplash.com/random/80x80',
            ],
            [
                'name' => 'John Sunarya',
                'position' => 'Chief Operations Officer',
                'origin' => 'V Manual',
                'testimony' => 'Saya telah menggunakan layanan core banking sistem ini selama beberapa bulan dan sangat puas dengan kinerjanya. Fitur-fitur yang tersedia sangat lengkap dan memudahkan saya dalam mengelola keuangan pribadi. Proses transaksi yang cepat dan aman membuat saya merasa nyaman dan tenang. Saya sangat merekomendasikan layanan ini kepada siapapun yang mencari solusi keuangan yang andal dan terpercaya.',
                'image' => 'https://source.unsplash.com/random/80x80',
            ],
            [
                'name' => 'Chou Cipuan',
                'position' => 'Chief Information Officer',
                'origin' => 'CV. Jaya Bersatu',
                'testimony' => 'Saya sangat senang dengan layanan Core Banking System yang ditawarkan oleh perusahaan ini. Sistemnya sangat cepat dan mudah digunakan, mempermudah saya dalam melakukan transaksi dan mengelola rekening bank. Layanan pelanggan juga sangat baik dan responsif dalam menangani masalah yang saya hadapi. Saya sangat merekomendasikan layanan ini kepada siapapun yang mencari solusi banking yang efisien dan dapat diandalkan.',
                'image' => 'https://source.unsplash.com/random/80x80',
            ],
        ];

        foreach ($testimonies as $testimony) {
            Testimony::query()->updateOrCreate([
                'name' => $testimony['name'],
                'position' => $testimony['position'],
                'origin' => $testimony['origin'],
                'testimony' => $testimony['testimony'],
                'image' => $testimony['image'],
            ]);
        }
    }
}
