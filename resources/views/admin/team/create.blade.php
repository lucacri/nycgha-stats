@extends('admin.master')

@section('admincontent')
    <H1>Create team</H1>
    {!! Former::open()->route('admin.team.store') !!}
    {!! Former::input('teamname')->label('Team name') !!}
    {!! Former::input('division')->label('Division') !!}
    {!! Former::input('logo_url') !!}
    {!! Former::textarea('description') !!}
    {!! Former::checkbox('active') !!}

    {!! Former::actions()->large_primary_submit('Submit')->large_inverse_reset('Reset') !!}
    {!! Former::close() !!}
@stop
