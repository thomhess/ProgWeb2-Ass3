<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('posts')->insert([
            'title' => 'Dette er enda en tittel',
            'body' => 'Bsdcdscs ascas c ascsa rwccCWA',
            'img' => 'dcsd',
            'category_id' => '2'
        ]);
        
         DB::table('posts')->insert([
            'title' => 'Dette er en tittel',
            'body' => 'Lorem ipsum dolor sit amet',
            'img' => 'sdvasdvc',
            'category_id' => '1'
        ]);
        
        DB::table('posts')->insert([
            'title' => 'Tittel 3',
            'body' => 'Lala lala lalalal sdfcsdf s dsdsdcdsc sdcsd sdcs sdc sdds sd  tg gr t wrtb erfererfsf sfdsd fs f',
            'img' => 'asxasxs',
            'category_id' => '2'
        ]);
        
        DB::table('posts')->insert([
            'title' => 'Tittel 5',
            'body' => 'Lala lala',
            'img' => 'asxasxs',
            'category_id' => '3'
        ]);
    }
}