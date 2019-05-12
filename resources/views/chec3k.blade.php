
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

     <!-- provide the csrf token -->
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <meta http-equiv="X-UA-Compatible" content="IE=9"/>
</head>
<body>

<form id="submit">

<input type="submit" class="postbutton">

</form>
<script>

$(document).ready(function(){
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           $(".postbutton").click(function(){
               $.ajax({
                   /* the route pointing to the post function */
                   url: "posti",
                   type: "POST",
                   /* send the csrf-token and the input to the controller */
                  contentType:"application/json",
                   data: JSON.stringify({"message":"few"}),
                   dataType: "JSON",
                   /* remind that 'data' is the response of the AjaxController */
                   success: function (data) {
                    console.log('fwee');
                   }
               });
           });

       });
</script>
</body>
</html>
