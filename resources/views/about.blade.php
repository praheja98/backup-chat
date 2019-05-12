@extends('layouts.app')

@section('content')
<h1> This is a test </h1>

@endsection

@section('sidebar')
@parent
<p> This is a section appended to anotherSidebar </p>

@endsection
