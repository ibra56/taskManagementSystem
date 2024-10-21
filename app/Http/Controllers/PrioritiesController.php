<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrioritiesRequest;
use App\Http\Requests\UpdatePrioritiesRequest;
use App\Models\Priorities;

class PrioritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrioritiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Priorities $priorities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priorities $priorities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrioritiesRequest $request, Priorities $priorities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priorities $priorities)
    {
        //
    }
}
