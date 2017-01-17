<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'user_id' => '1',
            'event_id' => '1', 
            'ticket_no'=> '12345',
            'ticket_id'=>'1',
            'amount'=>'1000'  
        ]);
     
        
       
    }

}
