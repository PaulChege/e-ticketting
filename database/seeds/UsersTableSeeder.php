<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Paul Chege',
            'email' => 'pchegenjenga@gmail.com',
            'role'=>'admin',
            'password' => bcrypt('123456'),
        ]);
         DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@email.com',
            'role'=>'customer',
            'password' => bcrypt('123456'),
        ]);
         DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'jane@email.com',
            'role'=>'merchant',
            'password' => bcrypt('123456'),
        ]);
   
}
}
