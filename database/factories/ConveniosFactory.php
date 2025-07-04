<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Convenios>
 */
class ConveniosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_universidad' => $this->faker->company(),
            'descripcion' => $this->faker->paragraph(),
            'logo' => $this->faker->imageUrl(640, 480, 'business', true, 'logo'),
            'enlace' => $this->faker->url(),
            'activo' => $this->faker->boolean(),
            'orden' => $this->faker->numberBetween(1, 100),
        ];
    }
}
