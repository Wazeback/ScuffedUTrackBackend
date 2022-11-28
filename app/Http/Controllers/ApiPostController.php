<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sprint;
use App\Models\User;
use App\Models\Group;
use App\Models\Year;


class ApiPostController extends Controller
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

//    function group() is called in api.php.
//    Collects group model on a given id with relations,
//    then returns a status and its collection formatted in json

    public function group() {

        $groupID = "1";

        $group = Group::
            where('id', $groupID)
            ->with('users')
            ->get();

        return Response()->json([
            'status' => 'true',
            'group' => $group
        ]);

    }

//    function year() is called in api.php.
//    Collects Year model on a given id with relations (done recursive),
//    then returns a status and its collection formatted in json

    public function year() {

        $yearID = "1";

        $year = Year::
            where('id', $yearID)
            ->with('groups.users')
            ->get();


        return Response()->json([
            'status' => 'true',
            'year' =>  $year
        ]);

    }


}
