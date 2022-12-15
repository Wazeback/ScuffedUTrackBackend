<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Project;
use App\Models\Sprint;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{

//    function group() is called in api.php.
//    Collects group model on a given id with relations,
//    then returns a status and its collection formatted in json.
//

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


//    function update() is called in api.php.
//    update() updates a Group Model on a given id
//    and updates with the validated table data from the request.
//    then returns a success message and status
    public function update($id, Request $request) {

        //TODO: add validation so a user can only change stuff if the values match the auth()->user->group_id except for when he is admin

        $validatedData = $request
            ->validate([
                'group' => 'min:4',
                'year_id' => 'required']);

        $project = Group::
        find($id)
            ->update([
                'group' => $validatedData["name"],
                'year_id' => $validatedData["year_id"]]);

        return Response()->json("you have successfully updated your group information!", 200);

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

//function delete() is called in api.php.
//it deletes a group based on a given id.
//also deletes all his relations.
//
    public function delete($id){

        Project::
            where('group_id', $id)
            ->delete();

        Sprint::
            whereRelation('project', 'id', $id)
            ->delete();


        Group::
            find($id)
            ->delete();

    }


}



