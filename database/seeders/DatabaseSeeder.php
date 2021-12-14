<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Users
        \App\Models\User::factory(10)->create();
        // Database seeder for contacts
        \App\Models\Contacts::factory(30)->create();
    }
}
