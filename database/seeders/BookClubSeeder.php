<?php

namespace Database\Seeders;

use App\Models\BookClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookClub::factory(2)->create();
    }
}
