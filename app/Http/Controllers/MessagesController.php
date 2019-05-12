<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
  

  public function alreadySubmit(Request $request)

  {


    $message = new Message;
    $message->message=$request->input('message');
    $message->name=$request->input('na');
    $message->save();

     return redirect('userCommonPost');

  }

public function userAlreadySubmit(Request $request){

$message = new Message;
$message->message=$request->input('message');
$message->name=$request->input('na');
$message->save();

return redirect('userPost');


}



    public function getMessages(){
      $messages = Message::all();

      return view('messages')->with('messages', $messages);
    }









}
