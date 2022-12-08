<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{

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

    public function yearUsers() {

        $yearID = 1;

        $yearUsers= User::
        whereRelation('group', 'year_id', $yearID)
            ->get();

        return Response()->json([
            'status' => 'true',
            'users' => $yearUsers
        ]);
    }


    public function create(Request $request) {

        $validatedData = $request->validate([
            'name' => 'nullable',
        ]);

        $year = Year::create([
            'name' => $validatedData["name"],
        ]);

        return Response()->json([
            "success"
        ]);
    }

}
