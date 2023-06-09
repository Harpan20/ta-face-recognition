<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $json = Storage::disk('local')->get('/json/countries.json');
        $countries = json_decode($json, true);

        foreach ($countries as $country) {
            Country::query()->updateOrCreate([
                'name' => $country['name'],
                'code' => $country['code'],
                'dial_code' => $country['dial_code'],
            ]);
        }
    }
}
