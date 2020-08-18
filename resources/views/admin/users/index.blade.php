@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Management Users') }}</div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Created date</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td> 
                         
                            <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td> 
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @can('edit-users')
                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                    <button type="button" class="btn btn-primary float-left mr-3">Edit</button>
                                </a>
                                @endcan
                                @can('delete-users')
                                <form action="{{ route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                                    @csrf
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endcan
                            </td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
