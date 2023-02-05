<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tasks')->with('user')->get();
        return view('project.index', compact('projects'));
    }

    public function create(){
        return view('project.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $this->validate( $request, [
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:12'],
        ] ) ;
        $data['created_by'] = Auth::user()->id;
        Project::create($data);
        return redirect()->route('project.index') ;    
    }

    public function edit($id){
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request , $id){
        Project::findOrFail($id)->update($request->all());
        return redirect()->route('project.index');
    }

    public function destroy($id){
        Project::findOrFail($id)->delete();
        return redirect()->back();
    }

}


