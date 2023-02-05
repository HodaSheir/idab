@extends('layouts.app', ['page' => __('editproject'), 'pageSlug' => 'Edit project'])

@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Edit project') }}</h5>
                </div>
                <form method="post" action="{{ route('project.update' , $project->id) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ __('Title') }}</label>
                            <input type="text" name="title"
                                class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Project title') }}" value="{{ old('title', $project->title) }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Project description') }}</label>
                            <textarea  name="description"
                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter project description') }}" value="{{ old('description') }}"
                                 rows="4" cols="50" >
                                 {{ $project->description }}
                            </textarea>    
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

@stop
