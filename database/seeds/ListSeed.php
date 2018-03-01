<?php

use Illuminate\Database\Seeder;
use App\Lists;

class ListSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lists::create(['name' => 'new name list', 'user_id' => 2]);
    }
}
