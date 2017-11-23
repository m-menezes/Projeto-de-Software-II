<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $user = [
          'name'=>"Oportunidades",
          'email'=>"oportunidadesufsm@gmail.com",
          'password'=>bcrypt("b4ck!Nbl4ck"),
        ];
        if(User::where('email','=',$user['email'])->count()){
          $usuario = User::where('email','=',$user['email'])->first();
          $usuario->update($user);
        }else{
          User::create($user);
        }
        $user = [
          'name'=>"teste",
          'email'=>"teste@teste.com",
          'password'=>bcrypt("teste123"),
        ];
        if(User::where('email','=',$user['email'])->count()){
          $usuario = User::where('email','=',$user['email'])->first();
          $usuario->update($user);
        }else{
          User::create($user);
        }
    }
}
