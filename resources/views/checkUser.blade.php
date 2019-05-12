<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,200italic,300italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://d3dhju7igb20wy.cloudfront.net/assets/0-4-0/all-the-things.css" />
    <style>
    
    li{
      list-style:none;
      font-size:20px;
    }
    #sbm{
      margin-top: 30px;
    }
    .navlist li{
      display:inline-block;
      margin-left:200px;
    }
    .container-fluid {
    color: white !important;
    background-color: #204d74;
}

    a.navbar-brand {
        color: white !important;
    }

    </style>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdn.rawgit.com/samsonjs/strftime/master/strftime-min.js"></script>
    <script src="//js.pusher.com/3.0/pusher.min.js"></script>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Pusher.log = function(msg) {
            console.log(msg);
        };
    </script>
</head>
<body>
@include('layouts.app')
  
  </ul>
  @if($access=="write")
    <h1> Live Chat </h1>
  <input type="text" name="postSbmit" id="postSbmit">
  <button id="sbm" class='btn btn-primary'>  Submit </button> <br /> <br />
@endif
  <div id="editing">
  @foreach($messages as $message)
  <ul class='list-group-item '>
    <li style='font-weight:600'> {{$message->name}} 
    <span style="margin-left:75%"> {{str_limit($message -> created_at, $limit = 10, $end = '')}} {{substr($message -> created_at, 10,20)}} </span>
    </li>
    <li>      {{  $message->message  }}             </li>
    @if($message->name==$userCheck) 
 <li> 
 <input type='hidden' id='delVal' value="{{$message->id}}" />
 <button id="deltSbm" onclick="valToDel({{$message->id}})"class='btn btn-danger'>  Delete Post </button> <br /> <br />
  </li>
 @endif
</ul>

@endforeach
  </div>


<script>
var msgToSend = document.getElementById('postSbmit');
console.log(msgToSend+"Debug1");
var ch = document.getElementById('sbm');


ch.addEventListener('click',c);

function valToDel(valDel,event) {
  console.log('checking value 1');
  console.log(valDel);
  console.log('checking value 2');
  $.ajax({
    type: "POST",
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    url:"/delUserPost",
    data: {// change data to this object
    message:valDel
  },
    dataType: "text",
    success: function(resultData) {
msgToSend.value="";
     }
  });



}
function c(){
  $.ajax({
    type: "POST",
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    url:"/cheUser",
    data: {// change data to this object
    message:msgToSend.value
  },
    dataType: "text",
    success: function(resultData) {
msgToSend.value="";
     }
  });
}
var pusher = new Pusher("a1debfc08e1e0a3e2c8a",{
  cluster:'us2'
});

var channel = pusher.subscribe('notifiedForNewMessage');

channel.bind('new-message',function(message){
console.log('checking user here 1');
console.log("{{$userCheck}}");
console.log('checking user here 2');
var getMessageContents = message.mess;
var containerForMessages=document.getElementById('editing');
containerForMessages.innerHTML="";
getMessageContents.forEach(function(eachMessageContent){
  var creatingNewMessageList = document.createElement("ul");
  creatingNewMessageList.setAttribute('class','list-group-item');
  var firstPartOfMessageList = document.createElement("li");
  firstPartOfMessageList.setAttribute('style', 'font-weight:600');
    var dateMess = eachMessageContent.created_at.substring(0,10);
    var dateElem = document.createElement('span');
    dateElem.setAttribute('style','margin-left:75%');
    dateElem.innerHTML = dateMess;
    var timeMess = eachMessageContent.created_at.substring(10,20);
    dateElem.innerHTML = dateMess + timeMess;
  var secondPartOfMessageList=document.createElement("li");
  var thirdPartOfMessageList=document.createElement("li");
  firstPartOfMessageList.innerHTML=eachMessageContent.name;
  firstPartOfMessageList.appendChild(dateElem);
  secondPartOfMessageList.innerHTML=eachMessageContent.message;
  var btnMessageList;
  if(eachMessageContent.name== "{{$userCheck}}")
  {
  
  btnMessageList = document.createElement('button');
  btnMessageList.setAttribute('class','btn btn-danger');
  btnMessageList.innerHTML ='Delete';
  btnMessageList.addEventListener('click', valToDel.bind(event,eachMessageContent.id));
  }

  console.log(eachMessageContent.name+"Debugger1");
  console.log(message.checkUser+"Debugger2");

creatingNewMessageList.appendChild(firstPartOfMessageList);
creatingNewMessageList.appendChild(secondPartOfMessageList);
creatingNewMessageList.appendChild(thirdPartOfMessageList);
if(btnMessageList) {
creatingNewMessageList.appendChild(btnMessageList);
}
containerForMessages.appendChild(creatingNewMessageList);

})


});

</script>
</body>
</html>
