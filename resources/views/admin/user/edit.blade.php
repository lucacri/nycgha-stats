@extends('admin.master')

@section('admincontent')
    <H1>Edit user</H1>
   {!! Former::open()->route('admin.user.update', [$user->id])->populate($user) !!}
   {!! Former::input('name') !!}
   {!! Former::input('email') !!}
   {!! Former::password('password')->value(NULL) !!}
   {!! Former::password('password_confirmation') !!}
   {!! Former::checkbox('admin')->help("Is this user an admin?") !!}

   {!! Former::select('manages_team_id')->label("Team managed")->fromQuery(Stats\Team::active()->get(), 'teamname', 'team_id') !!}

   {!! Former::actions()->large_primary_submit('Submit')->large_inverse_reset('Reset') !!}

   {!! Former::close() !!}
@stop
