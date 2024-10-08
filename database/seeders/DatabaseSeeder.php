<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        DB::table('sections')->insert([
            ['name' => 'Section 1', 'content' => 'Content for section 1'],
            ['name' => 'Section 2', 'content' => 'Content for section 2'],
            ['name' => 'Section 3', 'content' => 'Content for section 3'],
        ]);
    }
}
