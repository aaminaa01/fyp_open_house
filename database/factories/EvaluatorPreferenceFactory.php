<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Evaluator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvaluatorPreference>
 */
class EvaluatorPreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evaluator_id'=>Evaluator::all()->random()->id,
            'preference'=>$this->faker->randomElement(['networks','artificial intelligence','machine learning','iot','robotics','deep learning','software engineering','telecommunication','computer vision','large language models','human computer interaction']),
        ];
    }
}
