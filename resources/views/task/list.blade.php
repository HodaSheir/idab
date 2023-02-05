@extends('layouts.app',['page' => __('listProjectTasks'), 'pageSlug' => 'project Task'])

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('alerts.success')
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">>Project Task List for:  "{{ $p_name->title }}"</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">Task Title</th>
                                <th scope="col">Task Description</th>
                                <th scope="col">Employee</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Assigned by</th>
                                <th scope="col">Status</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Creation Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($task_list as $task)
                            <tr>
                                <td>{{ $task->task_title }}</td>
                                <td>{{ Str::limit($task->task_desc, 25) }}</td>
                                <td>{{ $task->user->name }}</td>
                                <td>{{ $task->creator->name }}</td>
                                <td>{{ $task->assignee->name }}</td>
                                <td>{{ $task->status}}</td>
                                <td> {{ $task->due_date ? $task->due_date->diffForHumans() : '' }} </td>
                                <td>{{ $task->created_at->diffForHumans() }}</td>
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