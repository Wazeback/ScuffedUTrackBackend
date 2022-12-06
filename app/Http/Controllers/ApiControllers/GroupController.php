<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

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



//    function create() creates a new group and change users group_id
//    with the request it gets through the api.php.
//    it will also validate the given request data.
//    If it's incorrectly formatted data it will return an error message.

    public function create(Request $request) {


        //TODO: auth()->user->id
        $userID = 1;

        $validatedData = $request->validate([
            'name' => 'nullable',
        ]);

        $group = Group::create([
            'name' => $validatedData["name"],
            'year_id' => $userID
        ]);

        return Response()->json([
            "success"
        ]);
    }
}
