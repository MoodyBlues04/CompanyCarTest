<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static string $password = '123456';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = Role::query()->where('name', 'admin')->first() ?? Role::factory()->create();
        return [
            'name' => fake()->name(),
            'role_id' => $role->id,
            'password' => Hash::make(static::$password),
        ];
    }
}
