<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sprint;
use App\Models\User;


class ApiPostController extends Controller
{

//    funtion sprint() is called in api.php.
//    Collects a sprint model and its relations (done manualy to simulate recursion)
//    on a given id then returns
//    a status and its collection formatted in json

    public function sprint() {

        $sprintId= "1";

        $sprint = Sprint::
        with('issues.priority', 'issues.subject')
            ->where('id', $sprintId)
            ->get();

        return Response()->json([
            'status' => 'true',
            'sprint' => $sprint
        ]);
    }

//    funtion project() is called in api.php.
//    Collects a project model and its relations (done manualy to simulate recursion)
//    on a given id then returns
//    a status and its collection formatted in json

    public function project() {

        $periodID = "1";

        $project = Project::
        with('sprint', 'sprint.issues', 'sprint.issues.priority', 'sprint.issues.subject')
            ->where('id', $periodID)
            ->get();

        return Response()->json([
            'status' => 'true',
            'project' => $project
        ]);
    }

//    funtion group() is called in api.php.
//    Collects User models and group model on a given id
//    then returns a status and its collection formatted in json

    public function group() {

        $groupID = "1";

        $users = User::
            where('group_id', $groupID)
            ->get();

        $group = User::
            where('group_id', $groupID)->with('group')
            ->first()
            ->group;


        return Response()->json([
            'status' => 'true',
            'group' => $group,
            'users' => $users
        ]);

    }

}
