<?php

namespace Database\Seeders;

use App\Models\Avi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AviSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avi::factory(10)->create();
    }
}
