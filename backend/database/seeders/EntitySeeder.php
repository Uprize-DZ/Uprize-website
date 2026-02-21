<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('entity')->truncate();

        DB::table('entity')->insert([
            'name' => 'Uprize',
            'description' => 'A primary entity for the system.',
            'slogan' => 'The best in the business.',
            'website' => 'https://example.com',
            'email' => 'admin@example.com',
            'phone' => '123-456-7890',
            'address' => '123 Example Street, City, Country',

        ]);
    }
}
