<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

     <!-- provide the csrf token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>

<form id="sub">

  <input id="textSubmit" name="textSubmit" type="text">

<input type="submit" class="po">

</form>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
           $(".po").click(function(){
             $.post( "posti", { namse:$('#textSubmit').val()})
 .done(function( data ) {
alert(data.success);
 });

       });

     });
</script>
</body>
</html>
