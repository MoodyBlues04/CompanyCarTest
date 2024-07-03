<?php

namespace Database\Seeders;

use App\Models\Comfort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ComfortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comfort::factory()
            ->count(3)
            ->state(new Sequence(
                ['value' => 1],
                ['value' => 2],
                ['value' => 3],
            ))
            ->create();
    }
}
