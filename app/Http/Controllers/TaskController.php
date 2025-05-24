<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $query = Task::query();

        // Filter berdasarkan status
        if ($request->status == 'pending') {
            $query->where('is_completed', false);
        } elseif ($request->status == 'selesai') {
            $query->where('is_completed', true);
        }

        // Filter berdasarkan pencarian nama task
        if ($request->has('search') && $request->search != '') {
            $query->where('task_name', 'like', '%' . $request->search . '%');
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
        ]);

        Task::create([
            'user_id' => Auth::id(), // Correct way to get authenticated user ID
            'task_name' => $request->task_name,
            'is_completed' => false
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // ... (keep other methods the same)

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'status' => 'required|in:0,1'
        ]);

        $task->update([
            'task_name' => $validated['task_name'],
            'is_completed' => $validated['status'] // Konversi langsung
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui.');
    }


    public function toggleComplete(Task $task)
    {
        $task->update(['is_completed' => !$task->is_completed]);
        return back()->with('success', 'Task status updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
