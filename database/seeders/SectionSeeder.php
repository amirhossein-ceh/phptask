<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            ['name' => 'Section 1', 'content' => 'Content for section 1'],
            ['name' => 'Section 2', 'content' => 'Content for section 2'],
            ['name' => 'Section 3', 'content' => 'Content for section 3'],
        ]);
    }

}
