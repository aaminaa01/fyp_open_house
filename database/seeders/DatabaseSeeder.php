<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use App\Models\Evaluation;
use App\Models\Project;
use App\Models\Evaluator;
use App\Models\FypGroup;
use App\Models\Keywords;
use App\Models\EvaluatorPreference;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Project::factory(15)->create();
        Evaluator::factory(5)->create();
        FypGroup::factory(15)->create();
        Keywords::factory(35)->create();
        Evaluation::factory(15)->create();
        AdminUser::factory(3)->create();
        EvaluatorPreference::factory(15)->create();
    }
}
