<?php

namespace App\PusherReference;
use Pusher\Pusher;


class PusherRef {

public $key;
public $id;
public $secret;
public $cluster;




public function __construct($key,$id,$secret,$cluster)
{
  $this->key=$key;
  $this->id=$id;
  $this->secret=$secret;
  $this->cluster=$cluster;

}

public function getPusherCredentials(){
  $options=array(
    'cluster'=>$this->cluster
  );
  $pusher = new Pusher($this->key,$this->secret,$this->id,$options);
  return $pusher;
}



}
