<?php

namespace App\Billing;
use Pusher\Pusher;


class Stripe {

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

public function checkTest(){
  $options=array(
    'cluster'=>$this->cluster
  );
  $pusher = new Pusher($this->key,$this->secret,$this->id,$options);
  return $pusher;
}



}
