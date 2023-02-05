@extends('layouts.app', ['page' => __('tasks'), 'pageSlug' => 'tasks'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">>All Tasks</h4>
                        </div>
                        @if (Auth::user()->manager)
                            <div class="col-4 text-right">
                                <a href="{{ route('task.create') }}" class="btn btn-sm btn-primary">Add Task</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter ">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Task Title</th>
                                    <th scope="col">Task Description</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Creation Date</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->task_title }}</td>
                                        <td>{{ Str::limit($task->task_desc, 25) }}</td>
                                        <td>{{ $task->project->title }}</td>
                                        <td>{{ $task->user ? $task->user->name : 'Not assigned yet' }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td> {{ $task->due_date ? $task->due_date->diffForHumans() : '' }} </td>
                                        <td>{{ $task->created_at->diffForHumans() }}</td>
                                        @if (Auth::user()->manager)
                                            <td>
                                                <a class="btn btn-sm btn-icon-only text-light"
                                                    href="{{ route('task.edit', $task->id) }}" role="button">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                            </td>
                                            <td class="text-right">
                                                <form method="post" action="{{ route('task.destroy', $task->id) }}">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-icon-only text-light">
                                                        <i class="tim-icons icon-trash-simple"></i>
                                                    </button>

                                                </form>
                                            </td>
                                            @if($task->status != 'cancelled')
                                            <td>
                                                <form method="post" action="{{ route('task.status', $task->id) }}">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-sm btn-icon-only text-light">
                                                        Cancel
                                                        <i class="tim-icons icon-tap-02"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            @endif
                                        @else
                                        <td>
                                            <form method="post" action="{{ route('task.status', $task->id) }}">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-sm btn-icon-only text-light">
                                                    change status
                                                    <i class="tim-icons icon-tap-02"></i>
                                                </button>
                                            </form>
                                        </td>    
                                        @endif
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
