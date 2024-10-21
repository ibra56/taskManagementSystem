<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    public $hello = 'Time';
    public function __construct(public $created_at)
    { }

    // public function __invoke()
    // {
    //     return $this->hello . ' ' . $this->created_at;
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->cursorPaginate(4);
        return view('task.index', compact('tasks'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        // dd($task);
        return view('task.show', compact('task'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
