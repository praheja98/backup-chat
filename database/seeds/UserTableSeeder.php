<?php

use Illuminate\Database\Seeder;
user App\User;

class UserTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

      public function run()
{
  factory(App\User::class, 2)->create()->each(function($u) {
    $u->issues()->save(factory(App\Issues::class)->make());
  });
}
    }
