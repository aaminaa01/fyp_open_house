<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FypGroup>
 */
class FypGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a new Project for each FypGroup
        $project = Project::factory()->create();

        return [
            'project_id' => $project->id,
            // Other attributes for FypGroup...
        ];
    }
}
