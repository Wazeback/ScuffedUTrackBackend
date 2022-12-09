<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Sprint;
use Illuminate\Http\Request;


class SprintController extends Controller
{


//    Function sprint() is called in api.php.
//    Collects a sprint model and its relations (done recursive)
//    on a given id, then returns
//    a status and its collection formatted in json.

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


//    Function create() creates a new sprint with the request it gets through the api.php.
//    It will also validate the given request data.
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

        return Response()->json("success created sprint", $sprint);
    }



//    Public function delete() is called in api.php.
//    This function softDeletes the selected sprint and,
//    all the related issues then,
//    returns a success message.

    public function delete($id)
    {

//        TODO: validate ID so that it can only user the auth()->user->group delete function.

        $sprint = Sprint::
            find($id)
            ->delete();


        $issues = Issue::
            where('sprint_id', $id)
            ->delete();


        return response()->json('Successfully Deleted');
    }

}
