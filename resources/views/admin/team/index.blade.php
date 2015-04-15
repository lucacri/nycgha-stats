@extends('admin.master')

@section('admincontent')
    <h1>Teams</h1>
    <a href="{{ URL::route('admin.team.create')}}" class="btn btn-success">Create a new team</a>
    <div class="row">
        <div class="col-md-12 text-center">
            {!! $teams->render() !!}
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Team</th>
                <th>Active</th>
                <th>Division</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->teamname }}</td>
                <td>{{ ($team->active ? "Yes":"No")}}</td>
                <td>{{ $team->division }}</td>
                <td>
                    <a href="{{ URL::route('admin.team.edit', [$team->team_id])}}" class="btn btn-default">Edit</a>
                    <a href="{{ URL::route('team.roster.index', [$team->team_id, $lastSeason->season_id]) }}" class="btn btn-default">Roster</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
