<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Issue;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use App\Models\Project;
use App\Models\Sprint;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $sprintName = "sprint 1";
        $projectName = "project 1";
        $groupName = "group 1";
        $issues = Sprint::with('issues.priority', 'issues.subject')->where('name', 'sprint 1')->get();
//        $issues->getRelations();  'issues.priority'


//        return dd(
//
//            Sprint::where('name', $sprintName)->find(1)->issue()->get(),
////            Issue::where('sprint_id', 1)->find(1)->sprint()->get(),
//            $allThing->sprint(),
//            Project::where('name', $projectName)->find(1)->sprint()->get(),
//            Group::where('group', $groupName)->find(1)->users()->get(),
//            Issue::where('sprint_id', 1)->find(1)->priority()->get(),
//
//        );

        return Response()->json([
                'status' => 'true',
                'sprint' => $issues,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIssueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIssueRequest  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
