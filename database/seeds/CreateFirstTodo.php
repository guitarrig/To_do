<?php

use Illuminate\Database\Seeder;
use App\Todo;
use App\User;

class CreateFirstTodo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Todo::create(['description' => ' world!', 'name' => "++ wish"]);
    #  User::create(['name' => 'Admin', 'email' => 'sizif.com@list.ru', 'password' => 'sizifcvsynbr']);
    }
}
