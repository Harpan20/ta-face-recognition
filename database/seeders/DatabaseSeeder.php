<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Advantage;
use App\Models\Benefit;
use App\Models\Category;
use App\Models\Client;
use App\Models\CompanyProfileVideo;
use App\Models\CompanyValue;
use App\Models\ContactForm;
use App\Models\Demo;
use App\Models\Email;
use App\Models\Excellence;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Mission;
use App\Models\PhoneNumber;
use App\Models\Position;
use App\Models\Post;
use App\Models\PostType;
use App\Models\Product;
use App\Models\Promo;
use App\Models\PromoClaim;
use App\Models\Support;
use App\Models\Tag;
use App\Models\Team;
use App\Models\Testimony;
use App\Models\Vision;
use App\Models\Whatsapp;
use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'adminbprpurwakarta@gmail.com',
            'username' => 'multipilar',
            'password' => bcrypt('multipilar_12345')
        ]);

        // \App\Models\Laporan::factory(10)->create();


        /*
            * SEEDER
        */
        // * profile
        $this->call(VisionSeeder::class);
        $this->call(MissionSeeder::class);
        $this->call(EmailSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(ExcellenceSeeder::class);
        $this->call(CompanyProfileVideoSeeder::class);
        $this->call(CompanyValueSeeder::class);

        // * start numbers related
        $this->call(CountrySeeder::class);
        $this->call(PhoneNumberSeeder::class);
        $this->call(WhatsappSeeder::class);
        // There is no Contact Form seeder
        // * end numbers related

        // * client
        $this->call(ClientSeeder::class);
        $this->call(TestimonySeeder::class);

        // * team
        $this->call(PositionSeeder::class);
        $this->call(TeamSeeder::class);

        // * post
        // There is no Category seeder
        $this->call(PostTypeSeeder::class);
        // There is no Post seeder
        // There is no Tag seeder

        // * product
        $this->call(FeatureSeeder::class);
        $this->call(BenefitSeeder::class);
        $this->call(AdvantageSeeder::class);
        $this->call(SupportSeeder::class);
        $this->call(FaqSeeder::class);

        // * demo


        /*
        * FACTORY
        */
        // * profile
        // Vision::factory(50)->create();
        // Mission::factory(50)->create();
        // Email::factory(50)->create();
        // Address::factory(50)->create();
        // Excellence::factory(50)->create();
        // CompanyProfileVideo::factory(50)->create();
        // CompanyValue::factory(50)->create();

        // * start numbers related
        // There is no Country factory
        // PhoneNumber::factory(50)->create();
        // Whatsapp::factory(50)->create();
        ContactForm::factory(10)->create();
        // * end numbers related

        // * client
        // Client::factory(50)->create();
        // Testimony::factory(50)->create();

        // * team
        // Position::factory(50)->create();
        // Team::factory(50)->create();

        // * post
        // PostType::factory(2)->create();
        Category::factory(3)->create();
        Post::factory(16)->hasTags(3)->create();
        Tag::factory(3)->create();

        // * product
        // Product::factory(4)
        //     ->hasFeatures(5)
        //     ->hasBenefits(5)
        //     ->hasAdvantages(5)
        //     ->hasSupports(5)
        //     ->hasFaqs(5)
        //     ->create();
        // Feature::factory(5)->create();
        // Benefit::factory(5)->create();
        // Advantage::factory(5)->create();
        // Support::factory(5)->create();
        // Faq::factory(5)->create();

        // * demo
        // Demo::factory(3)->create();

        // * promo
        Promo::factory(3)->create();
        // PromoClaim::factory(3)->create();
    }
}
