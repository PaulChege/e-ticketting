<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchants')->insert([
            'user_id' => '3',
            'description' => '...',
        ]);
         
   
}
}
