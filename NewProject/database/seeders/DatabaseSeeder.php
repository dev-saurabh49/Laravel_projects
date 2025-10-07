<?php

namespace Database\Seeders;

use App\Models\student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        student::factory()->count(5)->create();
        // $this->call([
        //     StudentSeeder::class,
            
        // ]);
    }
}
