<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'title' => 'Melding om ting',
            'content' => 'Litt bedre forklaring, her er litt tang',
            'from' => '2',
            'to' => '3',
            'created_at' => '2017-05-28 10:30:40',
        ]);
        
        DB::table('messages')->insert([
            'title' => 'Bra',
            'content' => 'Det er en deal',
            'from' => '3',
            'to' => '2',
            'created_at' => '2017-05-30 19:40:56',
        ]);
        
        DB::table('messages')->insert([
            'title' => 'Flotte greier',
            'content' => 'Da har vi en plan',
            'from' => '2',
            'to' => '3',
            'created_at' => '2017-05-28 18:30:56',
        ]);
    }
}