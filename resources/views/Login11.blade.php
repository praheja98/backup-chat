<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
.container-fluid{
  margin-top:200px;
}
.formEdit{
  border:2px solid black;
  padding:20px;
  background-color:sandybrown;
}
body{
  background-color:powderblue;
}

</style>

  <div class="container-fluid">
<div class="row">
  <div class="col-md-5 col-sm-4 col-xs-12 editing"></div>
  <div class="formEdit">
{!!   Form::open(['url' => 'login/submit'])    !!}

<div class="form-group">
{{Form::label('username','Username')}}
{{Form::text('username','',['class'=>'form-control','placeholder'=>'Enter Name'])}}

</div>

<div class="form-group">

{{Form::label('password','Password')}}

{{ Form::password('password', ['id' => 'password', 'class' => 'form-control','placeholder'=>'Enter Password']) }}
</div>

<div>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
</div>
<div id="footer">
If new User click on this link &nbsp;&nbsp; <a href="/Register"> Register </a>
</div>
</div>
</div>
</div>
