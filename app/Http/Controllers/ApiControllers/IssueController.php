<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Priority;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Sprint;
use App\Models\User;

class IssueController extends Controller
{
    public function allRelationsIssues() {

        $sprintId= "1";

        $sprint = Sprint::
        where('id', $sprintId)
            ->get();

        $priorities = Priority::all();

        $subjects = Subject::all();

        return Response()->json([
            'status' => 'true',
            'priorities' => $priorities,
            'subjects' => $subjects,
            'sprint' => $sprint,
        ]);
    }

    public function create(Request $request) {

        $userId = '1';
        $statusId = '1';

        $validatedData = $request->validate([
            'sprint_id' => 'nullable',
            'priority_id' => 'nullable',
            'subject_id' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
            'state' => 'nullable',
            'dueDate' => 'nullable',
            'estimation' => 'nullable',
            'spentTime' => 'nullable',
        ]);

        $issue = Issue::create([
            'user_id' => $userId,
            'status_id' => $statusId,
            'sprint_id' => $validatedData["sprint_id"][0],
            'priority_id' => $validatedData["priority_id"],
            'subject_id' => $validatedData["subject_id"],
            'title' => $validatedData["title"],
            'description' => $validatedData["description"],
            'state' => $validatedData["state"],
            'dueDate' => $validatedData["dueDate"],
            'estimation' => $validatedData["estimation"],
            'spentTime' => $validatedData["spentTime"],
        ]);

        return Response()->json([
            "success"
        ]);
    }
}
