<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Teknologi'
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Dyr'
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Kjøretøy'
        ]);
    }
}
