@include('layouts.app')

<ul class="list-group">
@foreach($users as $user)
<li class="editingInnerList list-group-item list-group-item-info" style="border:2px solid black">
<h3 style="color:red;"> User {{$user->username}} </h2>


<div class="formEdit">
{!! Form::open(['url' => "perm/".$user->id]) !!}
<h2> Make user access read or write only </h1>
{{Form::label('read', 'Read')}}
{{Form::checkbox('permission'.$user->id,'read',false,['class' => 'my-class'])}}


{{Form::label('write', 'Write')}}
{{Form::checkbox('permission'.$user->id,'write',false,['class' => 'my-class'])}}

<br /><br />
<div>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
</div>
 {!! Form::close()!!}
</div>
<a href="/deleteUser/{{$user->id}}"> Delete User      </a>
</li>
@endforeach
</ul>
<script>
var a = document.querySelectorAll('.formEdit');
a.forEach(function(d){
var b = d.querySelectorAll('.my-class');
b.forEach(function(e){
var f = b;
e.onchange=function(){
for(var i =0 ; i<f.length ; i++){
f[i].checked=false;
}

e.checked=true;

}

})})

</script>
