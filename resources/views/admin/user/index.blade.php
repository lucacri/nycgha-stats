@extends('admin.master')

@section('admincontent')
    <h1>Users</h1>
    <a href="{{ URL::route('admin.user.create')}}" class="btn btn-success">Create a new user</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @if($user->admin)
                    <td>Admin</td>
                @else
                    <td>Manages {{$user->managedTeam->teamname}}</td>
                @endif
                <td><a href="{{ URL::route('admin.user.edit', [$user->id])}}" class="btn btn-default">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
