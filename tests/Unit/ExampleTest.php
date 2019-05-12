<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

 /* @test */

function testingJson(){


  $response = $this->json('GET', '/testCheck');
// get Response from all data received
  $response
             ->assertStatus(200)
             ->assertExactJson([
                 'name'=>'Abigail'
             ]);


}

function testingStatus(){

$response = $this->get('/CommonPost');
$response->assertStatus(200);
$response=$this->get('/Login');
$response->assertStatus(200);
$response= $this->get('/userPost');
$response->assertStatus(200);
$response=$this->get('/displayUsers');
$response->assertStatus(200);

}











}
