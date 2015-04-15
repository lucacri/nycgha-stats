@extends('admin.master')

@section('admincontent')
    <h1>Roster of: {{ $team->teamname }} <small>Season: {{$season->season}} {{ $season->year }}</small></h1>

    <label>Change season</label>
    <select name="season_change" id="season_change">
        @foreach($seasons as $seasonItem)
            <option value="{{$seasonItem->season_id}}" {{ ($seasonItem->season_id == $season->season_id ? 'selected=selected': '') }}>{{$seasonItem->season}} {{ $seasonItem->year }}</option>
        @endforeach
    </select>
    <table class="table">
        <thead>
        <tr>
            <th>Person</th>
            <th>Role</th>
            <th>Status</th>
            <th>Leader</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($roster as $player)
            <tr>
                <td>{{ $player->person->fullName() }}</td>
                <td>{{ $player->playerRole->role}}</td>
                <td>{{ $player->playerStatus->status}}</td>
                <td>{{ $player->leader}}</td>
                <td>
                    {!! Former::open()->route('team.roster.removeplayer', [$team, $season]) !!}
                    {!! Former::danger_submit('Remove')!!}
                    <input type="hidden" name="roster_id" value="{{$player->roster_id}}"/>
                    {!! Former::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! Former::open()->route('team.roster.addplayer', [$team, $season]) !!}
    {!! Former::select('main_id')->label('Player')->fromQuery(Stats\Person::orderBy('fname', 'asc')->orderBy('lname', 'asc')->get(), 'fullname', 'main_id') !!}
    {!! Former::select('role_id')->label('Role')->fromQuery(Stats\PlayerRole::get(), 'role', 'role_id') !!}
    {!! Former::select('status_id')->label('Status')->fromQuery(Stats\PlayerStatus::get(), 'status', 'status_id') !!}
    {!! Former::select('leader')->label('Leader')->options(['' => '', 'C' => 'C', 'A' => 'A']) !!}
    {!! Former::success_submit('Add player')!!}
    {!! Former::close()!!}
@stop

@section('scripts')
    <script>
        $(function(){
            $('#season_change').change(function(){
                window.location = '/admin/team/{{$team->team_id}}/season/' + $('#season_change').val() + '/roster';
            });
        });
    </script>
@append
