<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keywords>
 */
class KeywordsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project = Project::inRandomOrder()->first();

        return [
            // Get an existing Project record
            'project_id'=>Project::all()->random()->id ,
            'keyword'=>$this->faker->randomElement(['networks','artificial intelligence','machine learning','iot','robotics','deep learning','software engineering','telecommunication','computer vision','large language models','human computer interaction']),
        ];
    }
}
