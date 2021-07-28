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
            'image' => "https://www.collinsdictionary.com/images/thumb/dog_230497594_250.jpg?version=4.0.166",
            'date' => $this->faker->dateTime(),
            'name' => $this->faker-> name(),
            'user_id' => "1",
            'comments' => $this->faker->realText()
        ];
    }
}
