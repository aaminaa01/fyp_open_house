<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Evaluation;
use App\Models\Keywords;
use App\Models\FypGroup;

class FypGroupController extends Controller
{
    public function showHomePg(Request $request)
{
    $id = $request->session()->get('id');
    $projectId = FypGroup::where('id', $id)->value('project_id');

    // Retrieve the group's project details
    $project = Project::where('id', $projectId)->first();

    // Retrieve the number of evaluators who have rated the group's project
    $evaluatorCount = Evaluation::where('project_id', $projectId)->count();

    // Retrieve the current keywords associated with the project
    $keywords = Keywords::where('project_id', $projectId)->pluck('keyword')->toArray();

    return view('fypgroup.home', compact('project', 'evaluatorCount', 'keywords'));
}


    public function editDetails(Request $request)
    {
        $id = $request->session()->get('id');
        $projectId = FypGroup::where('id', $id)->value('project_id');
        // Validate request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update project details
        $project = Project::where('group_id', $groupId)->first();
        $project->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('fyp_group.home')->with('success', 'Project details updated successfully.');
    }

    public function editKeywords(Request $request)
    {
        $id = $request->session()->get('id');    
        $projectId = FypGroup::where('id', $id)->value('project_id');    

        // Update keywords

        // Delete existing keywords for the current project
        Keywords::where('project_id', $projectId)->delete();

        // Insert new keywords
        $keywords = explode(',', $request->input('keywords'));
        foreach ($keywords as $keyword) {
            Keywords::create([
                'project_id' => $projectId,
                'keyword' => $keyword,
            ]);
        }

        return redirect()->route('fyp_group.home')->with('success', 'Keywords updated successfully.');
    }
}
