@include('layouts.app')

<div class="alert alert-info" role="alert"> <h3 style='color:black'>List of Messages Posted </h3></div>
@foreach($usPost as $message)

<ul class='list-group-item'>

<li style='font-weight:600'> {{$message->name}} 
    <span style="margin-left:75%"> {{str_limit($message -> created_at, $limit = 10, $end = '')}} {{substr($message -> created_at, 10,20)}} </span>
</li>
<li> 
    {{$message -> message}}
</li>

</ul>
@endforeach
