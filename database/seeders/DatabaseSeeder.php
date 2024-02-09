<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'is_superadmin' => true,
             'email' => 'superadmin@admin.cg',
         ]);

         \App\Models\User::factory()->create([
            'is_superadmin' => false,
            'email' => 'user@user.cg',
        ]);
    }
}
