<?php

namespace Tests\Feature;
use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
  use DatabaseMigrations;

/** @test **/


public function test_books_can_be_created(){
  $user=factory(\App\User::class)->create();
  $book = $user->books()->create([
    'name'=>'Elon Musk',
    'price'=>10
  ]);

$found_book=Book::find(1);
//$this->assertEquals($found_book->name,'Elon Musk');
//$this->assertEquals($found_book->price,10);

$this->seeInDatabase('books',['id'=>1,'name'=>'Elon Musk','price'=>10]);



}




}
