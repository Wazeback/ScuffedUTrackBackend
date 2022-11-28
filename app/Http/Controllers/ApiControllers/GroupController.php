<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Group;

class GroupController extends Controller
{

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
}
