<?php

namespace Database\Seeders;

use App\Models\Support;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supports = [
            // mobile
            [
                'name' =>  'Payment Gateway',
                'icon' =>  'https://lh6.googleusercontent.com/Gq0rwmHrPOtJg73kLOC4K3Y8tmf9Y2hO-65k_MVh5P6PECNoeSCLYI1L5PkG6mnRKj4=w2400',
            ],
            [
                'name' =>  'Virtual Account',
                'icon' =>  'https://lh4.googleusercontent.com/grcgbhEupBZpgNrx8XDgXuOWgzbjyVrbM_42pX5KwBA7Nfx2rLKi9283rKeFz_K2Kyk=w2400',
            ],
            [
                'name' =>  'PPOB',
                'icon' =>  'https://lh6.googleusercontent.com/YTem4OAKG2pXWPKVgJCrzdDIws5s37ur9EcgTesY33Nvhsogj6MhEyhWPdT4OnStwgw=w2400',
            ],
            [
                'name' =>  'SMS/WA Notification',
                'icon' =>  'https://lh5.googleusercontent.com/_S6dgZLrNxJttjuAxbfPKgo1oCHJfLsAfTDsNgxrcQQvjLklNnoFxqOzrWxeLab2uig=w2400',
            ],
            [
                'name' =>  'Mobile App Nasabah',
                'icon' =>  'https://lh4.googleusercontent.com/UJ-UEmP8Vi0ZJ8bgDHPzTm3mIvq7Qt263J5feXsOSzdONjRVM9X8qZ8Iw6sGj7NGXxY=w2400',
            ],
            // BMT
            [
                'name' =>  'Simfoni Mobile',
                'icon' =>  'https://lh5.googleusercontent.com/oRh1L0iXXoCOTRT1NypycdJ9hM3WbzvL1pXaXO0YO0Nokb_lqaELZF5yShPer9aXlmo=w2400',
            ],
            [
                'name' =>  'Portal Web Nasabah',
                'icon' =>  'https://lh4.googleusercontent.com/79x-0BmMXo7RQox-vKbGsVodSKwmdPlmdy4a4bBYvcl9v_KZeZkIdTulLy0xo2pm1yc=w2400',
            ],
        ];

        foreach ($supports as $support) {
            Support::query()->updateOrCreate([
                'name' => $support['name'],
                'icon' => $support['icon'],
            ]);
        }
    }
}
