@include('layouts.app');
<a href="/dele/sess"> Logout </a>

{!! Form::open(['url' => 'contact/submiting']) !!}

<div id="formEdit">

{{Form::label('message','Message')}}
{{Form::text('message','',['class'=>'form-control','placeholder'=>'Enter Message'])}}

{{ Form::hidden('na', $check,['class'=>'form-control','placeholder'=>'Enter Message']) }}



<div>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
</div>
</div>
@foreach($messages as $message)
<ul>
<li> Message Posted by {{$message->name}} </li>
<li> {{$message->message}} </li>
@if($message->name==$check)
<a href="delMessageCommon/{{$message->id}}"> Delete the message </a>
@endif

   </a>

</ul>
@endforeach
