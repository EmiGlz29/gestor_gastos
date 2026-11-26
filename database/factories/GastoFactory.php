<?php

namespace Database\Factories;

use App\Models\Gasto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gasto>
 */
class GastoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'user_id' => User::factory(),
        'fecha' => fake()->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
        'descripcion' => fake()->sentence(4),
        'forma_de_pago' => fake()->randomElement(['efectivo', 'credito', 'debito']),
        'monto' => fake()->randomFloat(2, 20, 3500),
        'imagen' => null,
    ];
}
}
