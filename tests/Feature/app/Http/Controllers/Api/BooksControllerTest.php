<?php

namespace Tests\Feature\app\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksControllerTest extends TestCase
{


public function test_index_method_return_all_books(){

$user=factory(App\User::class)->create();
$book_1=$user->books()->create([
  'name'=>'Star Wars',
  'price'=>20
]);

$book_2=$user->books()->create([
  'name'=>'Elon Musk',
  'price'=>200
]);

$this->get(route('api.books.index'))->assertStatus(200);



}



    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
