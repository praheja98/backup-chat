

<h1> Messages </h1>


@if(count($messages)>0)




@foreach($messages as $message)



<p> {{$message->name}} </p>
<p> {{$message->email}} </p>
<p> {{$message->email}}       </p> <a href="/Delete/{{$message->id}}"> Delete this message

@endforeach

@endif
