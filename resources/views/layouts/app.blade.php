<html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<style>
.navbar-brand {
    margin-left:10% !important;
}
.container-fluid {
    color: white !important;
    background-color: #204d74;
}

a.navbar-brand {
        color: white !important;
    }

    li{
      list-style:none;
      font-size:20px;
    }
</style>
</head>

<body>

<nav class="navbar navbar-default" style='border:2px solid black !important'>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="width:95% !important;display:flex !important">
      <a class="navbar-brand" href="/CommonPosting">Common Post </a>
      <a class="navbar-brand" href="/userPost">User Posts</a>
      <a class="navbar-brand" href="/displayUsers">Manage Users </a>
      <a class='navbar-brand' href="/dele/sess" id="logout" style='margin-left:auto !important' > Logout </a>
    
    </div>

  </div><!-- /.container-fluid -->
</nav>


@include('inc.messages')

@yield('content')



</body>
</html>
