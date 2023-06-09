<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            // Fitur simfoni mobile
            [
                'name' => 'Tabungan',
                'description' => 'Cek saldo & mutasi, transaksi tarik, setor, dan transfer.',
            ],
            [
                'name' => 'Kredit',
                'description' => 'Cek BAKI & tunggakan hingga bayar angsuran & bayar tunggakan.',
            ],
            [
                'name' => 'Deposito',
                'description' => 'Cek bunga deposito hingga pencairan bunga deposito.',
            ],
            [
                'name' => 'Laporan',
                'description' => 'Dashboard laporan laba rugi, neraca aset, neraca kewajiban, dan laporan rekening administratif.',
            ],
            [
                'name' => 'Presensi',
                'description' => 'Presensi check in dan check out untuk petugas untuk membatasi akses aplikasi dan memantau kinerja petugas.',
            ],
            [
                'name' => 'Otorisasi',
                'description' => 'Otorisasi bertingkat untuk memudahkan petugas melakukan approval transaksi.',
            ],
            [
                'name' => 'Action Plan',
                'description' => 'Action plan petugas untuk memantau kinerja dan pencapaian petugas berdasarkan action plan yang telah ditentukan.',
            ],
            // Fitur simfoni BMT
            [
                'name' => 'Dashboard',
                'description' => 'Rekap laporan - laporan dalam bentuk tampilan dashboard untuk memudahkan pemantauan kinerja.',
            ],
            [
                'name' => 'Administrasi',
                'description' => 'Registrasi nasabah, data nasabah, hingga fitur administrasi lainnya.',
            ],
            [
                'name' => 'PPBL/SDBL',
                'description' => 'Setoran, tarik, bunga, administrasi dan penutupan.',
            ],
            [
                'name' => 'Simpanan',
                'description' => 'Proses pembukaan rekening, cetak mutasi,  transaksi setor & tarik, hingga laporan - laporan.',
            ],
            [
                'name' => 'Deposito v2',
                'description' => 'Proses pembukaan rekening, cetak bilyet, setoran, pembayaran keuntungan, hingga laporan - laporan.',
            ],
            [
                'name' => 'Pembiayaan',
                'description' => 'Proses pembukaan rekening, pencairan pembiayaan, angsuran, restrukturisasi, hingga laporan - laporan.',
            ],
            [
                'name' => 'Inventaris',
                'description' => 'Memudahkan dokumentasi inventaris perusahaan.',
            ],
            [
                'name' => 'Laporan v2',
                'description' => 'Neraca, laba rugi, TKS, Fraud Detection System, laporan kinerja pegawai, laporan resiko pembiayaan dan likuiditas, dan laporan - laporan lainnya.',
            ],
            // Fitur simfoni BPR
            [
                'name' => 'Nasabah',
                'description' => 'Registrasi nasabah hingga pencarian data nasabah.',
            ],
            [
                'name' => 'Tabungan v2',
                'description' => 'Proses pembukaan rekening, cetak mutasi,  transaksi setor & tarik, hingga laporan - laporan.',
            ],
            [
                'name' => 'Kredit v2',
                'description' => 'Proses pembukaan rekening, pencairan kredit, angsuran, restrukturisasi, hingga laporan - laporan.',
            ],
            [
                'name' => 'Deposito v3',
                'description' => 'Proses pembukaan rekening, cetak bilyet, setoran, pembayaran bunga, hingga laporan - laporan.',
            ],
            [
                'name' => 'Transaksi Lain',
                'description' => 'PPBL, SDBL, pinjaman diterima, inventaris, antar kantor aktiva hingga antar kantor pasiva.',
            ],
            [
                'name' => 'Pembukuan',
                'description' => 'Update kualitas, perbaikan neraca, hingga transaksi pajak.',
            ],
            [
                'name' => 'Laporan v3',
                'description' => 'Neraca, laba rugi, TKS, Fraud Detection System, laporan kinerja pegawai, laporan resiko kredit dan likuiditas, dan laporan - laporan lainnya.',
            ],
            // Fitur simfoni LKM
        ];

        foreach ($features as $feature) {
            Feature::query()->updateOrCreate([
                'name' => $feature['name'],
                'description' => $feature['description'],
            ]);
        }
    }
}
