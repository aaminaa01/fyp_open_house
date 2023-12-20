<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluator;
use App\Models\EvaluatorPreference;
use App\Models\Keywords;
use App\Models\Project;
use App\Models\Evaluation; // Add this line
use Illuminate\Support\Facades\DB;

class EvaluatorController extends Controller
{
    public function showHomePg(Request $request)
    {
        $id = $request->session()->get('id');
        $name = DB::table('evaluators')->where('id', $id)->value('name');

        // Retrieve projects based on preferences without using relationships
        $projects = DB::table('evaluator_preferences')
            ->join('keywords', 'evaluator_preferences.preference', '=', 'keywords.keyword')
            ->join('projects', 'keywords.project_id', '=', 'projects.id')
            ->where('evaluator_preferences.evaluator_id', $id)
            ->select('projects.*')
            ->distinct()
            ->get();

        // Retrieve evaluations for the current evaluator
        $evaluations = Evaluation::where('evaluator_id', $id)->get()->keyBy('project_id');

        return view('evaluator.home', compact('name', 'projects', 'evaluations', 'request'));
    }

    public function updateRating(Request $request)
    {
        $projectId = $request->input('projectId');
        $newRating = $request->input('newRating');
        $evaluatorId = $request->input('evaluatorId');

        // Check if the record exists in evaluations
        $existingRating = DB::table('evaluations')
            ->where('project_id', $projectId)
            ->where('evaluator_id', $evaluatorId)
            ->first();

        if ($existingRating) {
            // Update the existing record
            DB::table('evaluations')
                ->where('project_id', $projectId)
                ->where('evaluator_id', $evaluatorId)
                ->update(['score' => $newRating]);
        } else {
            // Insert a new record
            DB::table('evaluations')->insert([
                'project_id' => $projectId,
                'evaluator_id' => $evaluatorId,
                'score' => $newRating,
            ]);
        }
        return response()->json(['success' => 'Rating updated successfully.']);
    }
}
