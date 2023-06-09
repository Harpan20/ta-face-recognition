<?php

namespace Database\Seeders;

use App\Models\CompanyValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyValue::query()->updateOrCreate([
            'name' => 'Ikut',
            'image' => 'https://lh6.googleusercontent.com/vv79RU0XYqTBYoImRfdWDtTrqD6f1kJQ4tjUrv8kbbXV7yzk9SzG_ugzhQt1RTvzisU=w2400'
        ]);
    }
}
