<?php

namespace App\Http\Controllers;


use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Sprint;


class ApiPostController extends Controller
{

//    funtion sprint() is called in api.php.
//    Collects a sprint model and its relations (done manualy to simulate recursion)
//    on a given name then returns
//    a status and its collection formatted in json

    public function sprint() {

        $sprintName = "sprint 1";
        $sprint = Sprint::
        with('issues.priority', 'issues.subject')
            ->where('name', $sprintName)->get();

        return Response()->json([
            'status' => 'true',
            'sprint' => $sprint
        ]);

    }

//    funtion project() is called in api.php.
//    Collects a project model and its relations (done manualy to simulate recursion)
//    on a given name then returns
//    a status and its collectionformatted in json

    public  function project() {

        $periodName = "project 1";

        $project = Project::
        with('sprint', 'sprint.issues', 'sprint.issues.priority', 'sprint.issues.subject')
            ->where('name', $periodName)->get();

        return Response()->json([
            'status' => 'true',
            'project' => $project
        ]);


    }

}
