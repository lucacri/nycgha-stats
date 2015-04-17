@extends('admin.master')

@section('admincontent')
    <H1>Create a new person</H1>
    {!! Former::open()->route('admin.person.store') !!}
    {!! Former::input('fname')->label('First name') !!}
    {!! Former::input('lname')->label('Last name') !!}
    {!! Former::input('phone_home') !!}
    {!! Former::input('phone_work') !!}
    {!! Former::input('phone_mobile') !!}
    {!! Former::input('address1') !!}
    {!! Former::input('address2') !!}
    {!! Former::input('city') !!}
    {!! Former::input('state') !!}
    {!! Former::input('postalcode')->label("ZIP Code") !!}
    {!! Former::input('country') !!}
    {!! Former::input('gender')->help("Gender (M or F)") !!}
    {!! Former::input('birthdate')->help("Format: YYYY-MM-DD. Ex: 1984-01-17") !!}

    {!! Former::actions()->large_primary_submit('Submit')->large_inverse_reset('Reset') !!}
    {!! Former::close() !!}
@stop
