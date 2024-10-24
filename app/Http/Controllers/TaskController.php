<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Priorities;


class TaskController extends Controller
{

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
        return view('task.create', [
            'priorities' => Priorities::all(),
            'categories' => Task::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tasks',
            'description' => 'nullable|sometimes',
            'category_id' => 'required',
            'priorities_id' => 'required',
            'deadline' => 'required|date|after:now',
        ]);
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'priorities_id' => $request->priorities_id,
            'deadline' => $request->deadline,
            'user_id' => Auth::user()->id,
            'status' => 'pending',
        ]);
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task = Task::with('attachments')->find($task->id);
        return view('task.show', compact('task'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
{
    // No need to use Task::find() since route model binding will handle it
    return view('task.edit', [
        'task' => $task,
        'priorities' => Priorities::all(),
        'categories' => Category::all(),
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
       
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'nullable|sometimes',
            'category_id' => 'required',
            'priorities_id' => 'required',
            'deadline' => 'required',
            'status' => 'required',

        ]);
        // dd($request->all());
        $task->update($attributes);
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index');
    }

    
   
}
