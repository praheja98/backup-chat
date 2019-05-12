<?php

use App\Issue;
use App\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 2)->create()->each(function($u) {
        $u->issues()->save(factory(App\Issue::class)->make());
      });



    }
}
