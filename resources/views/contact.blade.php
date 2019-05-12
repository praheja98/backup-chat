@extends('layouts.app')

@section('content')

{!! Form::open(['url' => 'contact/submit']) !!}


<div class="form-group">

{{Form::label('name','Name')}}
{{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Name '])}}

</div>



<div class="form-group">

{{Form::label('message','Message')}}
{{Form::text('message','',['class'=>'form-control','placeholder'=>'Enter Email'])}}

</div>



<div>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
</div>



@endsection
