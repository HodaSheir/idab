<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
       
        if($user->manager){
            $tasks = Task::with('project')->with('user')->get();
        }else{
            $tasks = Task::where('user_id','=' , $user->id)->with('project')->with('user')->get();
        }
        
        return view('task.index', compact('tasks'));
    }

    public function create(){
        $all_employees = User::where('manager', '=', 0)->get();
        $all_projects = Project::all();
        return view('task.create',compact('all_employees','all_projects'));
    }

    public function store(Request $request){
        $data = $request->all();
      //  dd($data);
        $this->validate( $request, [
            'task_title' => ['required', 'min:3'],
            'task_desc' => ['required', 'min:12'],
            'project' => 'required',
            'employee' =>'required',
            'duedate' => 'required'
        ] ) ;
        $data['project_id'] = $data['project'];
        $data['user_id'] = $data['employee'];
        $data['assigned_by'] = Auth::user()->id;
        $data['created_by'] = Auth::user()->id;
        Task::create($data);
        return redirect()->route('task.index') ;    
    }

    public function edit($id){
        $all_employees = User::where('manager', '=', 0)->get();
        $all_projects = Project::all();
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task','all_employees','all_projects'));
    }

    public function update(Request $request , $id){
        $data = $request->all();
        $task = Task::findOrFail($id);
        $data['user_id'] = $data['employee'] ? $data['employee'] : $task['user_id'];
        $data['project_id'] = $data['project'] ? $data['project'] : $task['project_id'] ;
        $task->update($data);
        return redirect()->route('task.index');
    }

    public function destroy($id){
        Task::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function list($project_id){
        $p_name = Project::find($project_id) ;
        $task_list = Task::where('project_id','=' , $project_id)
                            ->with('assignee')
                            ->with('user')
                            ->with('creator')->get();
        return view('task.list', compact('p_name','task_list'));
    }

    public function changeStatus($task_id){
        $task = Task::findOrFail($task_id);
        $user = Auth::user();
        if($user->manager){
            //cancel task
            $status = 'cancelled';
        }else{
            //make running or completed
            $status = $task['status'] == 'running' ? 'completed' : 'running';
        }
        $comp_at = $status == 'running' ? NULL : now();
        $task->update(['status' => $status , 'completed_at' => $comp_at]);
        return redirect()->back();
    }
}
