<?php

namespace Database\Seeders;

use App\Models\CompanyProfileVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyProfileVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyProfileVideo::query()->updateOrCreate([
            'name' => 'Multipilar Company Profile Video ',
            'link_video' => 'https://www.youtube.com/embed/a1KWAeL4KfA',
        ]);
    }
}
