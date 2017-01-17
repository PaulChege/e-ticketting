<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UsersTableSeeder::class);
       $this->call(MerchantsTableSeeder::class);
       $this->call(EventsTableSeeder::class);
       $this->call(TransactionsTableSeeder::class);
       $this->call(TicketsTableSeeder::class);

    }
}
