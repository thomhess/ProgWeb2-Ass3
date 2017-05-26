<?php

use Illuminate\Database\Seeder;

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
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Thomas',
            'email' => 'hessthom@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'anders',
            'email' => 'andy@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
