<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{

//    function group() is called in api.php.
//    Collects group model on a given id with relations,
//    then returns a status and its collection formatted in json

    public function group($id) {

        $groupID = $id;

        $group = Group::
        where('id', $groupID)
            ->with('users')
            ->get();

        return Response()->json([
            'status' => 'true',
            'group' => $group
        ]);
    }



//    function create() is called in api.php.
//    Creates a new group and changes a users group_id
//    with the request it gets through the api.php.
//    it will also validate the given request data.
//    If it's incorrectly formatted data it will return an error message.

    public function create(Request $request) {


        //TODO: auth()->user->id

        $userYearID = 1;

        $validatedData = $request->validate
            (['name' => 'nullable',
            'user_id' => 'nullable',]);

        $group = Group::
            create
                (['group' => $validatedData["name"],
                'year_id' => $userYearID]);


        foreach($validatedData["user_id"] as $userID) {
            $user = User::
                where('id', $userID)
                ->update
                    (['group_id' => $group->id]);
        }

        return Response()->json(["you have successfully created a new group"]);

    }
}
