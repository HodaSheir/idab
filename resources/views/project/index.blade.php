@extends('layouts.app', ['page' => __('projects'), 'pageSlug' => 'projects'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Projects</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary">Add project</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">project title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Task count</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ Str::limit($project->description, 25) }}</td>
                                    <td>{{ $project->user->name }}</td>
                                    <td>{{ count($project->tasks) }}</td>
                                    <td>{{ $project->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-icon-only text-light"
                                            href="{{ route('project.edit', $project->id) }}" role="button">
                                            <i class="tim-icons icon-pencil"></i>
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <form method="post" action="{{ route('project.destroy', $project->id) }}">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-icon-only text-light">
                                                <i class="tim-icons icon-trash-simple"></i>
                                            </button>

                                        </form>
                                    </td>
                                    @if (count($project->tasks))
                                    <td>
                                        <a class="btn btn-sm btn-icon-only text-light"
                                            href="{{ route('task.list', $project->id) }}" role="button">
                                            list project tasks
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
