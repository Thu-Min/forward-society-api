<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Database\Seeders\ContactSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);


        $this->call([
            BlogSeeder::class,
            CategorySeeder::class,
            EventSeeder::class,
            ContactSeeder::class,
        ]);


        Testimonial::factory(100)->create();

        Contact::factory(30)->create();
    }
}
