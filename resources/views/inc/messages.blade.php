@if(count($errors) > 0 ))
@foreach($errors->all() as $error)
<div class="error">
{{$error}}
</div>
@endforeach

@endif

@if(session('success1'))

<div class="alert alert-success">

{{session('success1')}}


</div>


@endif


@if(session('userAuth'))

{{session('userAuth')}}




@else

@endif
