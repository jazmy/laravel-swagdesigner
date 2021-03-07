<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $user = \App\User::firstOrCreate([
      'email' => 'jill@harvard.edu',
      'name' => 'Jill TestUser',
      'password' => \Hash::make('helloworld')
    ]);

    $user = \App\User::firstOrCreate([
      'email' => 'jamal@harvard.edu',
      'name' => 'Jamal TestUser',
      'password' => \Hash::make('helloworld')
    ]);

    $user = \App\User::firstOrCreate([
      'email' => 'jazzerup@gmail.com',
      'name' => 'Jasmine Robinson',
      'password' => \Hash::make('helloworld')
    ]);

  }
}
