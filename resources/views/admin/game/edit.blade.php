@extends('admin.master')

@section('admincontent')
    <H1>Edit game</H1>
   {!! Former::open()->route('admin.game.update', [$game])->populate($game) !!}
   {!! Former::select('ghateam_id')->label('GHA Team')->fromQuery(Stats\Team::orderBy('teamname')->get(), 'teamname', 'team_id') !!}
   {!! Former::select('otherteam_id')->label('Other Team')->fromQuery(Stats\Team::orderBy('teamname')->get(), 'teamname', 'team_id') !!}
    {!! Former::select('season_id')->label('season')->options($seasons) !!}
   {!! Former::input('datetime')->label("Game Time") !!}

   {!! Former::input('goalsagainst') !!}
   {!! Former::select('overtimestatus')->label('Overtime')->options(['' => 'No', 'OT' => "Overtime", "SO" => "Shoot-outs"]) !!}
   {!! Former::input('playoffflag') !!}

   {!! Former::actions()->large_primary_submit('Submit')->large_inverse_reset('Reset') !!}
   {!! Former::close() !!}
@stop

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#datetime').datetimepicker({
//                inline: true,
                sideBySide: true,
                format: 'YYYY-MM-D HH:mm:00'
            });
        });
    </script>
@append
