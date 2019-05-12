@include('layouts.app')


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
<li> {{$message->name}} 
<span> {{str_limit($message -> created_at, $limit = 10, $end = '')}} {{substr($message -> created_at, 10,20)}} </span>
</li>
<li> {{$message->message}} </li>



<a href="del/{{$message->id}}"> Delete the message </a>

   </a>

</ul>
@endforeach
