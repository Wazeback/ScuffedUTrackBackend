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

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Requests $request) {
        $sprint = Sprint::create([
            'name' => $request->name,
            'project_id' => $request->project_id,
        ]);
    }
}
