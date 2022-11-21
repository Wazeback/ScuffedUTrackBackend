<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Http\Requests\StorePriorityRequest;
use App\Http\Requests\UpdatePriorityRequest;

class PriorityController extends Controller
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
     * @param  \App\Http\Requests\StorePriorityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePriorityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show(Priority $priority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit(Priority $priority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriorityRequest  $request
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriorityRequest $request, Priority $priority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priority $priority)
    {
        //
    }
}
