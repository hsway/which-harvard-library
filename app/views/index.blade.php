@extends('_master')

@section('searchBox')

<h1>Where do I go for that?</h1>

<br />

{{ Form::open(array('url' => '/')) }}

    {{ Form::text('search', null, array('placeholder' => 'Enter your search')) }}

    <br /><br />

    {{ Form::submit('Tell me!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop