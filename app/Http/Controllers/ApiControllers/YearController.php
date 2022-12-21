<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Issue;
use App\Models\Project;
use App\Models\Sprint;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{


//    function year() is called in api.php.
//    Collects Year model on a given id with relations
//    (done recursive), then
//    returns a status and its collection formatted in json
    public function year($id) {

        $yearId = $id;

        $year = Year::
        where('id', $yearId)
            ->with('groups.users')
            ->get();

        return Response()->json([
            'status' => 'true',
            'year' =>  $year
        ]);
    }


//    function years() is called in api.php.
//    Collects all Year models with relations
//    (done recursive), then returns a
//    status and its collection formatted in json
    public function years() {

        $userID = 1;

        $years = Year::
        with('groups.users')
        ->get();

        return Response()->json([
            'status' => 'true',
            'years' => $years
        ]);
    }


//    function years() is called in api.php.
//    Collects all User models that are in a year.
//    It returns:
//    status and its collection formatted in json
    public function yearUsers($id) {

        $yearId = $id;

        $yearUsers= User::
        whereRelation('group', 'year_id', $yearId)
            ->get();

        return Response()->json([
            'status' => 'true',
            'users' => $yearUsers
        ]);
    }


//    function create() is called in api.php.
//    create() creates a new Model Year,
//    that is filled with the validated data from the request.
//    then returns a success message
    public function create(Request $request) {

        $validatedData = $request->validate([
            'name' => 'nullable',
        ]);

        $year = Year::create([
            'name' => $validatedData["name"],
        ]);

        return Response()->json("success");
    }

//    function update() is called in api.php.
//    update() updates a Model Year on a given id
//    and updates with the validated table data from the request.
//    then returns a success message
    public function update($id, Request $request) {

        $validatedData = $request
            ->validate(['name' => 'min:1',]);

        $year = Year::
            find($id)
            ->update(['name' => $validatedData["name"]]);

        return Response()->json("you have successfully updated your year information!");

    }


//    function delete() is called in api.php.
//    this function deletes the year and all its relations.
//    it will also clear the group_id table from the users.
//    finally it returns a success message
    public function delete($id) {

        User::
            whereRelation('group.year', 'id', $id)
            ->update(['group_id' => null]);

        Issue::
            whereRelation('sprint.project.group.year', 'id', $id)
            ->delete();

        Sprint::
            whereRelation('project.group.year', 'id', $id)
            ->delete();

        Project::
            whereRelation('group.year', 'id' , $id)
            ->delete();

        Year::
            find($id)
            ->delete();

        Group::
            where('year_id', $id)
            ->delete();

        return response()->json('the year has been deleted successfully!');

    }


}
