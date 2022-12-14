<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
//    function project() is called in api.php.
//    Collects a project model and its relations,
//    on a given id then returns
//    a status and its collection formatted in json.

    public function project($id) {

        $periodID = $id;

        $project = Project::
        where('id', $periodID)
            ->with('sprint.issues.priority', 'sprint.issues.subject', 'sprint.issues.status')
            ->get();

        return Response()->json([
            'status' => 'true',
            'project' => $project
        ]);
    }


//  function projects() is called in api.php.
//  Collects all Projects of an auth users group.
//  Returns  a status and its collections formatted in json.


    public function projects() {

        //TODO: auth()->user->group_id
        $groupID = 1;

        $projects = Project::
        whereRelation('group.users', 'group_id', $groupID)
       ->get();

        return Response()->json([
            'status' => 'true',
            'projects' => $projects
        ]);
    }


//    function create() creates a new project with the request it gets through the api.php.
//    it will also validate the given request data.
//    If it's incorrectly formatted data it will return an error message.

    public function create(Request $request) {


        //TODO: auth()->user->group_id
        $userGroupId = 1;

        $validatedData = $request->validate([
            'name' => 'nullable',
            'start' => 'nullable',
            'end' => 'nullable',
        ]);

        $project = Project::create([
            'name' => $validatedData["name"],
            'group_id' => $userGroupId,
            'start' => $validatedData["start"],
            'end' => $validatedData["end"]
        ]);

        return Response()->json([
            "success"
        ]);
    }



    public function delete($id) {


        $issues = Issue::
        whereRelation('sprint.project', 'id', $id)
            ->delete();


        $sprints = Sprint::
        where('project_id', $id)
            ->delete();

        $project = Project::
            find($id)
            ->delete();

        return response()->json("you have deleted your selected project successfully!");

    }

}
