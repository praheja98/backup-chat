<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
.container-fluid{
  margin-top:200px;
}
.formEdit{
  border:2px solid black;
  padding:40px;
  background-color:sandybrown;
}
body{
  background-color:powderblue;
}
.btnStyling{
  margin-top:20px;
  margin:0px auto;
}
input.btn.btn-primary {
    margin-top: 18px;
    margin-left:50px;
    display: block !important;
}

</style>
<div class="container-fluid">
<div class="row">
<div class="col-md-5 col-sm-4 col-xs-12 editing"></div>
<div class="formEdit">
{!! Form::open(['url' => 'contact/register']) !!}
<div class="headerForName commonEdit">
{{Form::label('name','Username')}}
{{Form::text('username','',['class'=>'form-control','placeholder'=>'Enter Name '])}}
</div>

<div class="headerForPassword commonEdit">
{{Form::label('password','Password')}}
{{Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password'])}}
</div>

<div class="headerForRePassword commonEdit">
{{Form::label('ReEnterPassword','ReEnterPassword')}}
{{Form::password('rpassword',['class'=>'form-control','placeholder'=>'Re Enter Password'])}}
</div>
<div class="btnStyling">

{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
</div>
</div>
</div>
</div>
</div>
