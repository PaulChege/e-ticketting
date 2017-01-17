<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'event_id' => '1',
            'name' => 'Normal', 
            'price'=> '1000'  
        ]);
         
    }

}
