<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        Listing::factory(6)->create();
        // listing::create([
        //     'title'         => 'Full-Stack Engineer',
        //     'tags'          => 'JavaScript, Vue.js, Laravel',
        //     'company_name'  => 'Tech Solutions Inc.',
        //     'location'      => 'San Francisco, CA',
        //     'email'         => 'careers@techsolutions.com',
        //     'website'       => 'https://techsolutions.com',
        //     'description'   => 'Join our innovative team as a Full-Stack Engineer. The ideal candidate will be passionate about technology and have a knack for solving complex problems with clean code.',
        // ]);
        // listing::create([
        //     'title'         => 'Backend Developer',
        //     'tags'          => 'PHP, Laravel, API',
        //     'company_name'  => 'Innovatech',
        //     'location'      => 'Austin, TX',
        //     'email'         => 'jobs@innovatech.com',
        //     'website'       => 'https://innovatech.com',
        //     'description'   => 'Innovatech is looking for a dedicated Backend Developer to help us build robust APIs and maintain our server infrastructure. Experience with Laravel is a plus.',
        // ]);














        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
