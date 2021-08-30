<?php

namespace Matteomeloni\Swapi\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Matteomeloni\Swapi\Models\Planet;

class PlanetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Planet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'diameter' => (string)$this->faker->randomNumber(),
            'rotation_period' => (string)$this->faker->randomNumber(),
            'gravity' => $this->faker->word,
            'population' => (string)$this->faker->randomNumber(),
            'climate' => $this->faker->word,
            'terrain' => $this->faker->word,
            'surface_water' => (string)$this->faker->randomNumber(),
            'films' => $this->faker->randomElements,
            'url' => $this->faker->url,
        ];
    }
}
