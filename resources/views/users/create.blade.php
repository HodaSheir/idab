@extends('layouts.app', ['page' => __('user_create'), 'pageSlug' => 'Add user'])

@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Add user') }}</h5>
                </div>
                <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('post')

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Email address') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Email address') }}" value="{{ old('email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="form-group">
                            <label>{{ __('User role') }}</label>
                            <select  name="manager" id="manager" class="form-control" value="{{ old('manager') }}">
                                <option value="1">Manager</option>
                                <option value="0">Employee</option>
                            </select>    
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{ __('New Password') }}</label>
                            <input type="password" name="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('New Password') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group">
                            <label>{{ __('Confirm New Password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="{{ __('Confirm New Password') }}" value="" required>
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
