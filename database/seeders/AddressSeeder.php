<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::query()->updateOrCreate([
            'name' => 'Multipilar Balantika',
            'address' => 'Jl. Permata Raya Blok H Kav. No. 4, Tugujaya',
            'province' => 'Jawa Barat',
            'district' => 'Tasikmalaya',
            'sub_district' => 'Cihideung',
            'postal_code' => '46115',
            'longitude' => '-7.346951838958031',
            'latitude' => '108.21980459973618',
            'is_main' => 1,
        ]);
    }
}
