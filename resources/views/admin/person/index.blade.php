@extends('admin.master')

@section('admincontent')
    <h1>People</h1>
    <a href="{{ URL::route('admin.person.create')}}" class="btn btn-success">Create a new person</a>
    <div class="row">
        <div class="col-md-12 text-center">
            {!! $people->render() !!}
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($people as $person)
            <tr>
                <td>{{ $person->fullName() }}</td>
                <td><a href="{{ URL::route('admin.person.edit', [$person->main_id])}}" class="btn btn-default">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
