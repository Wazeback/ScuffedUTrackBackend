<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Sprint;

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
}
