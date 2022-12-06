<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Sprint;
use Illuminate\Http\Request;


class SprintController extends Controller
{


//    function sprint() is called in api.php.
//    Collects a sprint model and its relations (done recursive)
//    on a given id, then returns
//    a status and its collection formatted in json

    public function sprint() {

        $sprintId= "1";

        $sprint = Sprint::
        where('id', $sprintId)
            ->with('issues.priority', 'issues.subject', 'issues.status')
            ->get();

        return Response()->json([
            'status' => 'true',
            'sprint' => $sprint
        ]);
    }


    public function sprints() {

        //TODO: auth()->user->group_id
        $groupID = 1;

        $sprints = Sprint::
            whereRelation('project.group.users', 'group_id', $groupID)
            ->get();

        return Response()->json([
            'status' => 'true',
            'sprint' => $sprints
        ]);
}


//    function create() creates a new sprint with the request it gets through the api.php.
//    it will also validate the given request data.
//    If it's incorrectly formatted data it will return an error message.

    public function create(Request $request) {

        $validatedData = $request->validate([
            'name' => 'nullable',
            'project_id' => 'nullable',
            'start' => 'nullable',
            'end' => 'nullable',
        ]);

        $sprint = Sprint::create([
            'name' => $validatedData["name"],
            'project_id' => $validatedData["project_id"],
            'start' => $validatedData["start"],
            'end' => $validatedData["end"]
        ]);

        return Response()->json([
            "success"
        ]);
    }

}
