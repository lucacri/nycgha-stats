@extends('admin.master')

@section('admincontent')
    <h1>Games</h1>
    <a href="{{ URL::route('admin.game.create')}}" class="btn btn-success">Create a new game</a>
    <div class="row">
        <div class="col-md-12 text-center">
            {!! $games->render() !!}
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>GHA Team</th>
                <th>Other Team</th>
                <th>Goals Against</th>
                <th>Overtime</th>
                <th>Playoff</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>{{ $game->datetime }}</td>
                <td>{{ $game->ghaTeam->teamname}}</td>
                <td>{{ $game->otherTeam->teamname}}</td>
                <td>{{ $game->goalsagainst}}</td>
                <td>{{ $game->overtimestatus}}</td>
                <td>{{ $game->playoffflag}}</td>

                <td><a href="{{ URL::route('admin.game.edit', [$game])}}" class="btn btn-default">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
