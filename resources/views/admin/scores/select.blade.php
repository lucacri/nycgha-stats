@extends('admin.master')

@section('admincontent')
    <div class="row">
        <div class="col-md-12">
            <h2>Game score</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 form-inline">
            <div class="form-group">
                <label>Season</label>
                <select name="season" id="season" class="form-control">
                    @foreach($seasons as $seasonItem)
                        <option value="{{$seasonItem->season_id}}" {{ ($season  && $seasonItem->season_id == $season->season_id ? "selected=selected" : '') }}>{{$seasonItem->season}} {{ $seasonItem->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Game</label>
                <select name="game" id="game" class="form-control">
                    @foreach($games as $gameItem)
                        <option value="{{$gameItem->game_id}}" {{ ($game  && $gameItem->game_id == $game->game_id? "selected=selected" : '') }}>{{$gameItem->datetime}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @if($game)
    <hr/>
    <div class="row">
        <div class="col-md-12">
            {!! Former::open()->route('admin.scores.update', [$season, $game])->populate($game) !!}
            {!! Former::input('goalsagainst')->label('Goals against')->required() !!}
            {!! Former::select('overtimestatus')->label('Overtime')->options(['' => 'No', 'OT' => "Overtime", "SO" => "Shoot-outs"]) !!}
            {!! Former::select('playoffflag')->label('Playoff')->options(['' => 'No', 1 => "Semi-final", 2 => "Final"]) !!}

            <h2>Players</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Played</th>
                    <th>Goals</th>
                    <th>Assists</th>
                    <th>PIM</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td>{{ $player->person->fullname }}</td>
                            <td><input type="checkbox" name="player[{{$player->roster_id}}][played]" value="true" {{ ($player->stat !== null ? 'checked' : "") }}></td>
                            <td><input type="number" class="form-control" min="0" name="player[{{$player->roster_id}}][goals]" value="{{ ($player->stat == null ? '0' : intval($player->stat->goals))}}"/></td>
                            <td><input type="number" class="form-control" min="0" name="player[{{$player->roster_id}}][assists]" value="{{ ($player->stat == null ? '0' : intval($player->stat->assists))}}"/></td>
                            <td><input type="number" class="form-control" min="0" name="player[{{$player->roster_id}}][penaltyminutes]" value="{{ ($player->stat == null ? '0' : intval($player->stat->penaltyminutes))}}"/></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            {!! Former::actions()->large_primary_submit('Submit')->large_inverse_reset('Reset') !!}
            {!! Former::close() !!}
        </div>
    </div>
    @endif
@stop

@section('scripts')
    <script>
        $(function(){
            $('#season').change(function(){
                window.location = '/admin/scores/?season_id=' + $('#season').val();
            });

            $('#game').change(function(){
                window.location = '/admin/scores/?season_id=' + $('#season').val() + '&game_id=' + $('#game').val();
            });
        });
    </script>
@append
