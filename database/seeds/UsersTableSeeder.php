<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\User::create( ['name' => 'teste', 'email' => 'teste@teste.com', 'password' => HASH::make( 'teste123' ) ]);
    }
}
