<?php

namespace Database\Factories;

use App\Models\PostSitter;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostSitterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostSitter::class;

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
