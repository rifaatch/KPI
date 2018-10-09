<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('users')->insert([
        [
            'name'=>'admin',
            'email' => 'admin@test.com',
            'password' => $this->hash_pass('123123'),
            'remember_token' => str_random(10),
        ],
        [
             'name'=>'user',
             'email' => 'user@test.com',
             'password' =>$this->hash_pass('123123'),
             'remember_token' => str_random(10),
         ],

        ]);

    }


    function hash_pass($pass)
    {
        return bcrypt($pass) ;
}
}
