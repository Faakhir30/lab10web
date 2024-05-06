<?php

namespace Database\Seeders;

use App\Models\attendance;
use App\Models\User;
use App\Models\classes;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();
        classes::factory(10)->create();
        attendance::factory(10)->create();
    }
}
