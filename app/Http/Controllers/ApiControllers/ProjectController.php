<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //    function project() is called in api.php.
//    Collects a project model and its relations,
//    on a given id then returns
//    a status and its collection formatted in json

    public function project() {

        $periodID = "1";

        $project = Project::
        where('id', $periodID)
            ->with('sprint.issues.priority', 'sprint.issues.subject', 'sprint.issues.status')
            ->get();

        return Response()->json([
            'status' => 'true',
            'project' => $project
        ]);
    }


    public function projects() {

        $groupID = 1;

        $projects = Project::
        whereRelation('group.users', 'group_id', $groupID)
       ->get();

        return Response()->json([
            'status' => 'true',
            'projects' => $projects
        ]);
    }


    public function create(Request $request) {

        $userId = 1;

        $validatedData = $request->validate([
            'name' => 'nullable',
            'start' => 'nullable',
            'end' => 'nullable',
        ]);

        $project = Project::create([
            'name' => $validatedData["name"],
            'group_id' => $userId,
            'start' => $validatedData["start"],
            'end' => $validatedData["end"]
        ]);

        return Response()->json([
            "success"
        ]);
    }

}
