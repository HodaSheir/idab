@extends('layouts.app', ['page' => __('users'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Add user</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">Role</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>{{ $user->manager ? 'Manager' : 'Employee' }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-icon-only text-light"
                                                href="{{ route('user.edit', $user->id) }}" role="button">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                        </td>
                                        <td class="text-right">
                                            <form method="post" action="{{ route('user.destroy', $user->id) }}">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-icon-only text-light">
                                                    <i class="tim-icons icon-trash-simple"></i>
                                                </button>

                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('user.role', $user->id) }}">

                                                @csrf
                                                @method('put')

                                                <button type="submit" class="btn btn-sm btn-icon-only text-light">
                                                    Change role
                                                    <i class="tim-icons icon-key-25"></i>
                                                </button>

                                            </form>
                                        </td>
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
