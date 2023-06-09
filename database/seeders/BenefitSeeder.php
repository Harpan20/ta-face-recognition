<?php

namespace Database\Seeders;

use App\Models\Benefit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $benefits = [
            // mobile
            [
                'name' => 'Branchless Banking',
                'description' => 'Memberikan pelayanan di luar kantor agar dapat memberikan pelayanan prima kepada nasabah.',
                'icon' => 'https://lh4.googleusercontent.com/0R1CAeL_AVHyeSVnXjfcSWy2CjYQs8P24ll5617__eiI8XwFyKhGs4kaFqlB2FVna7g=w2400',
            ],
            [
                'name' => 'Reduce Operational Cost',
                'description' => 'Operasional perbankan menjadi semi otomatisasi sehingga dapat meminimalisasi SDM dan biaya operasional lainnya.',
                'icon' => 'https://lh4.googleusercontent.com/HHF0TfcmlL1D3xHURhdomOrESpCY2XZb8lV2bEtVmSMMG72TKm1Rj30ZLFnxpIdihAE=w2400',
            ],
            [
                'name' => 'Stakeholder Decision Support',
                'description' => 'Penjelasan poin manfaat maksimal 3 baris, Penjelasan poin manfaat maksimal 3 baris, Bukan berupa poin-poin.',
                'icon' => 'https://lh5.googleusercontent.com/v9XMBLlr5MbABp7NGxUENEYMVKpGGuEmPaHbaMAHCaTbz_3st7lOlSdt7ZLwEodDT2k=w2400',
            ],
            [
                'name' => 'Microbanking Suitable Services',
                'description' => 'Pelayanan secara langsung kepada nasabah di luar kantor sangat cocok dengan profil nasabah perbankan BPR/LKM/BMT.',
                'icon' => 'https://lh6.googleusercontent.com/TP2Kr5nzDDNl7NX8gn_c4-4IV95Mm-NLoNZFzzPi7iouu4s9AVbqXXxfswtBuThlLwo=w2400',
            ],
            [
                'name' => 'Performance Monitoring',
                'description' => 'Memantau kinerja petugas berdasarkan pencapaian yang telah ditentukan melalui SimfoniMobile.',
                'icon' => 'https://lh5.googleusercontent.com/9DMYeJ4lg9z0Ffyw-aDNd9rui2sOglUbKJ_IXOuk1UlSIOzRYSMweokrCILTm8lI6a4=w2400',
            ],
            [
                'name' => 'Realtime Operations',
                'description' => 'Sistem berjalan secara realtime sehingga pelayanan dapat lebih cepat dan efisien.',
                'icon' => 'https://lh6.googleusercontent.com/zLYfQqJ2KbRVvErw60IEDEh4ok2ifMZppW5F5VDhc179yzoXk09nFN0anxHRo5gwt28=w2400',
            ],
            // BMT
            [
                'name' => 'End to End Banking Solution',
                'description' => 'Memudahkan kebutuhan operasional perbankan mulai dari administrasi, laporan, funding, landing, dan deposito.',
                'icon' => 'https://lh5.googleusercontent.com/PhE5X2lh2dod9CXq0M8erVPgL3hemfgGLaDG12c992vOOsV6rAMSXpzOTaKyNSSVInY=w2400',
            ],
            [
                'name' => 'Sharia Core Banking System Guarantee',
                'description' => 'Core Banking System (CBS) SimfoniBMT telah memenuhi ketentuan syariah agar dapat memberikan keberkahan bagi nasabah dan BMT.',
                'icon' => 'https://lh4.googleusercontent.com/yllBFULWEhQ4KdvN40c68XkM5BAYsGrJqfVxLylL2SG166nBSrtZp8-sqBGRpOWm87I=w2400',
            ],
            [
                'name' => 'Minimize Human Errors',
                'description' => 'Core Banking System (CBS) dapat mengolah data secara otomatis sehingga pembukuan dan laporan akan lebih akuntabel.',
                'icon' => 'https://lh5.googleusercontent.com/EvzBI7DjxMgjbQfsi3RKKAggj0S4Z5DXUPg-EeaAhJpxA8x_vJQtLZGwal9_DWkKYhA=w2400',
            ],
            // BPR
            // LKM
        ];

        foreach ($benefits as $benefit) {
            Benefit::query()->updateOrCreate([
                'name' => $benefit['name'],
                'description' => $benefit['description'],
                'icon' => $benefit['icon'],
            ]);
        }
    }
}
