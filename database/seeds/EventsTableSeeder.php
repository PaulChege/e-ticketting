<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'merchant_id' => '1',
            'name' => 'Event 1', 
            'imagepath'=>'generic.jpg'  
        ]);
         DB::table('events')->insert([
            'merchant_id' => '1',
            'name' => 'Event 2',   
            'imagepath'=>'generic.jpg'  
        ]);
        DB::table('events')->insert([
            'merchant_id' => '1',
            'name' => 'Event 3',   
            'imagepath'=>'generic.jpg'  
        ]);
    }

}
