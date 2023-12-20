<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Evaluator;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'score'=>$this->faker->numberBetween(1,10),
            'evaluator_id'=>Evaluator::all()->random()->id,
            'project_id'=>Project::all()->random()->id,
        ];
    }
}
