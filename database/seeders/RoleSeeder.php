<?php

namespace Database\Seeders;

use App\Models\Comfort;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()
            ->count(3)
            ->has(Comfort::factory()->count(3))
            ->state(new Sequence(
                ['name' => 'employee'],
                ['name' => 'head'],
                ['name' => 'admin'],
            ))
            ->create();
    }
}
