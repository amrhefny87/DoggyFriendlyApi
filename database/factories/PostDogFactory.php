<?php

namespace Database\Factories;

use App\Models\PostDog;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostDogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostDog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'description' => $this->faker->realText(),
            'image' => $this->faker->image(),
            'date' => $this->faker->dateTime(),
            'name' => $this->faker-> name(),
            'comments' => $this->faker->realText()
        ];
    }
}
