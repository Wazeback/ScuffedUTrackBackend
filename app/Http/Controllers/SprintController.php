<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use App\Http\Requests\StoreSprintRequest;
use App\Http\Requests\UpdateSprintRequest;

class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSprintRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSprintRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function show(Sprint $sprint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function edit(Sprint $sprint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSprintRequest  $request
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSprintRequest $request, Sprint $sprint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sprint $sprint)
    {
        //
    }
}
