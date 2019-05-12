<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;
use App\userAuth;
//use Pusher\Pusher;
use App\PusherReference\PusherRef;
use Illuminate\Support\Facades\Hash;
class userAuthController extends Controller
{

/*
public function testingFun(PusherRef $pusher){
dd($pusher->checkTest());

}
*/


public function show(){
$messages = Message::all();
return $messages;
}

public function pusNavigate(Request $request){

  $messages = Message::all();

$userCheck = $request->session()->get('LoginData');
$access=userAuth::where('username',$userCheck)->first();
if($access) {
  $access = $access->access;
if($userCheck=="admin")
  return view('check',['messages'=>$messages]);
  else {
    return view('checkUser',['messages'=>$messages,'userCheck'=>$userCheck,'access'=>$access]);
  }

}
  else {
    $request->session()->flush();
    return view('403');

  }


}


public function messageEnteredByAdmin(Request $request,PusherRef $pusher){

  $messageCreate = new Message;
  $messageCreate->name=$request->session()->get('LoginData');
  $messageCreate->message = $request->input('message');
  // Save Message
  $messageCreate->save();
  $mess = Message::all();
  $pusher=$pusher->getPusherCredentials();


      $message = [
          'mess' => $mess,
          'timestamp' => (time()*1000)
      ];
    $pusher->trigger('notifiedForNewMessage', 'new-message',$message);
  }

  public function messageEnteredByUser(Request $request,PusherRef $pusher){


    $messageCreate = new Message;
    $messageCreate->name=$request->session()->get('LoginData');
    $messageCreate->message = $request->input('message');
    // Save Message
    $messageCreate->save();
    $mess = Message::all();

  $pusher=$pusher->getPusherCredentials();

        $message = [
            'mess' => $mess,
              'checkUser'=>$request->session()->get('LoginData'),
            'timestamp' => (time()*1000)
        ];
      $pusher->trigger('notifiedForNewMessage', 'new-message',$message);
    }




public function delMessageCommon($userMessDelete){
  $findMessageToBeDeleted=Message::where('id',$userMessDelete)->first();
$findMessageToBeDeleted->delete();
return redirect('/CommonPosting');

}


public function getUserCommon(Request $request){
return redirect('/CommonPosting');

}


public function settingsData(Request $request,$getUser){
$userFind = userAuth::find($getUser);

$assignPerm= $request->input('permission'.$userFind->id);
$userFind->access=$assignPerm;
$userFind->save();

return redirect('settings');



}


  public function delete($getUserToBeDeleted)
  {

     $findUserToDelete = Message::find($getUserToBeDeleted);
     $findUserToDelete->delete();

  }

public function login(Request $request){


if($request->session()->get('LoginData')){
  return redirect('/CommonPosting');
}
else{

$this->validate($request,[
'username' => 'required',
'password' => 'required'
]);

$findUser=$request->input('username');
$findPassword=$request->input('password');
$userAvailable=userAuth::where('username',$findUser)->first();

if($userAvailable)
$userAvailablePassword=userAuth::where('username',$findUser)->first()->password;
if($userAvailable && Hash::check($findPassword,$userAvailablePassword))
{
  $message=Message::all();
$request->session()->put('LoginData',$request->input('username'));
$getUser=$request->session()->get('LoginData');
return redirect('/CommonPosting');

}

else if($userAvailable && !(Hash::check($findPassword,$userAvailablePassword)) )
{

echo "Incorrect Password Entered ";
echo "<br>";
echo '<a href="/Login">Click here to Login Again </a>';


}

else{
  echo "User doesnot Exist Please Register";
  echo "<a href='/Register'> Register here </a>";
}




}
}

public function getUserPosts(Request $request){
$sessionDataForUser=$request->session()->get('LoginData');
$permission = userAuth::where('username',$sessionDataForUser)->first()->access;
$messages=Message::where('name',$sessionDataForUser)->get();
return view('userPost',['usPost'=>$messages,'check'=>$sessionDataForUser,'permission'=>$permission]);
}





public function getMessages(Request $request){
return redirect('/CommonPosting');
}


public function checkLogin(Request $request){


  $userSession=$request->session()->get('LoginData');
 //echo "This is a check".$a."yp";
  if($userSession){
    $message=Message::all();
    $getUser=$request->session()->get('LoginData');

  return redirect('/CommonPosting');

  }


  else{

    return view('Login11');
  }
}


public function registerUser(Request $request){

$register = new userAuth;
$username=$request->input('username');
$password= $request->input('password');
$reEnteredPassword= $request->input('rpassword');

if($password== $reEnteredPassword)
{
$msgSent = Message::all();
$register->username=$username;
$register->password=Hash::make($password);
$register->access="write";
$register->save();
$request->session()->put('LoginData',$request->input('username'));
return redirect('/CommonPosting');

}
else
return redirect('/Register');
}


public function updPostDel(Request $request,PusherRef $pusher) {
  $msgDel=$request->input('message');
  $pusher=$pusher->getPusherCredentials();
        $messages=Message::all();
        $msgFind=Message::find($msgDel);
        $msgFind->delete();
        $mess = Message::all();
        $message = [
            'mess' => $mess,
            'checkUser'=>$request->session()->get('LoginData'),
            'timestamp' => (time()*1000)
        ];
      $pusher->trigger('notifiedForNewMessage', 'new-message',$message);
    }






public function requestForDelete($msgDel){
  $messages=Message::all();
$msgFind=Message::find($msgDel);
$msgFind->delete();
return redirect('/CommonPosting');
}





public function del(Request $request){
  $request->session()->flush();
  return redirect('Login');


}

public function deleteUser($userDel){
$userToBeDeleted =userAuth::find($userDel);
$userToBeDeleted->delete();
return redirect('/displayUsers');


}

public function displayUsers(Request $request){
  $getUser = $request->session()->get('LoginData');
  if($getUser=="admin")
  {
  $getAllUser = userAuth::all();
  return view('userDisplay',['users'=>$getAllUser]);
}
else{
return view('403');
}



}



}
