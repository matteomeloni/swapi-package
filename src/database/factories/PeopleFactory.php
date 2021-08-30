<?php

namespace Matteomeloni\Swapi\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Matteomeloni\Swapi\Models\People;
use Matteomeloni\Swapi\Models\Planet;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'planet_id' => Planet::factory()->create(),
            'name' => $this->faker->name,
            'birth_year' => $this->faker->word,
            'eye_color' => $this->faker->word,
            'gender' => $this->faker->word,
            'hair_color' => $this->faker->word,
            'height' => (string)$this->faker->randomNumber(),
            'mass' => (string)$this->faker->randomNumber(),
            'skin_color' => $this->faker->word,
        ];
    }
}
