<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Year;

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
}
