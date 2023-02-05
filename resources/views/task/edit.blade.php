@extends('layouts.app', ['page' => __('edit task'), 'pageSlug' => 'edit_task'])

@section('content')

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Edit Task') }}</h5>
            </div>
            <form method="post" action="{{ route('task.update' , $task->id) }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success')

                    <div class="form-group{{ $errors->has('task_title') ? ' has-danger' : '' }}">
                        <label>{{ __('Title') }}</label>
                        <input type="text" name="task_title"
                            class="form-control{{ $errors->has('task_title') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Task Title') }}" value="{{ $task->task_title}}">
                        @include('alerts.feedback', ['field' => 'task_title'])
                    </div>
                    <div class="form-group{{ $errors->has('task_desc') ? ' has-danger' : '' }}">
                        <label>{{ __('Task description') }}</label>
                        <textarea  name="task_desc"
                            class="form-control{{ $errors->has('task_desc') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Enter Task description') }}" 
                             rows="4" cols="50" >{{ $task->task_desc}}
                        </textarea>    
                        @include('alerts.feedback', ['field' => 'task_desc'])
                    </div>
                    <div class="form-group">
                        <label>{{ __('Task Status') }}</label>
                        <select  name="status" id="status" class="form-control">
                            <option value="">Please select</option>
                            <option @if($task->status == 'not_assigned' ) selected @endif value="not_assigned">Not assigned</option>
                            <option @if($task->status  == 'running' ) selected @endif value="running">Running</option>
                            <option @if($task->status  == 'cancelled' ) selected @endif value="cancelled">Cancelled</option>
                            <option @if($task->status  == 'completed' ) selected @endif value="completed">Completed</option>
                        </select>    
                    </div>
                    <div class="form-group{{ $errors->has('project') ? ' has-danger' : '' }}">
                        <label>{{ __('Project') }}</label>
                        <select  name="project" id="project" 
                        class="form-control{{ $errors->has('project') ? ' is-invalid' : '' }}" >
                           <option value="">please select</option>
                            @foreach ($all_projects as $project )
                                <option @if($task->project_id  == $project->id ) selected @endif value="{{ $project->id }}">{{ $project->title }}</option>
                            @endforeach
                        </select>  
                        @include('alerts.feedback', ['field' => 'project'])  
                    </div>
                    <div class="form-group{{ $errors->has('employee') ? ' has-danger' : '' }}">
                        <label>{{ __('Employee') }}</label>
                        <select  name="employee" id="employee" 
                        class="form-control{{ $errors->has('employee') ? ' is-invalid' : '' }}" value="{{ old('employee') }}">
                            <option value="">please select</option>
                            @foreach ($all_employees as $employee )
                                <option @if($task->employee_id  == $employee->id ) selected @endif value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>  
                        @include('alerts.feedback', ['field' => 'employee'])  
                    </div>
                    <div class="form-group{{ $errors->has('duedate') ? ' has-danger' : '' }}"">
                        <label class="label-control">{{ __('Due date') }}</label>
                        <input type="date" id="duedate" name="duedate" value="{{ $task->duedate}}"
                        class="form-control{{ $errors->has('duedate') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'duedate'])  
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

@endsection