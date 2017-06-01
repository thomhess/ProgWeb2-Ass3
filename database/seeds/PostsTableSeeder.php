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
            'title' => 'Ipad 2 gis bort',
            'body' => 'Andre generasjonen av Apples banebrytende iPad har raskere prosessor og grafikk, er tynnere og finnes i hvitt. Lansert 11 mars 2011 i USA.',
            'img' => 'post/ipad.jpeg',
            'category_id' => '1',
            'user_id' => '1',
            'created_at' => '2017-05-21 10:10:16',
        ]);
        
         DB::table('posts')->insert([
            'title' => 'Katt trenger nytt hjem',
            'body' => 'Katten vår trenger nytt hjem grunnet flytting.',
            'img' => 'post/katt.jpg',
            'category_id' => '2',
            'user_id' => '2',
             'created_at' => '2017-05-21 10:12:33',
        ]);
        
        DB::table('posts')->insert([
            'title' => 'Gammel motorsykkel trenger ny eier',
            'body' => 'Gir vekk min flotte motorsykel. Ta kontakt.',
            'img' => 'post/motorsykkel.jpg',
            'category_id' => '3',
            'user_id' => '2',
            'created_at' => '2017-05-23 19:22:01',
        ]);
        
        DB::table('posts')->insert([
            'title' => 'Mikke (hamster)',
            'body' => 'Mikke trenger et nytt hjem. Han er 5 år gammel og lager lite bråk. Snill og grei.',
            'img' => 'post/hamster.jpg',
            'category_id' => '2',
            'user_id' => '3',
            'created_at' => '2017-05-23 21:39:19',
        ]);

        DB::table('posts')->insert([
            'title' => 'Oscar (hund) trenger nye eiere',
            'body' => 'Oscar trenger nytt hjem da vi flytter til USA. Han er en rolig og snill hund.',
            'img' => 'post/hund.jpg',
            'category_id' => '2',
            'user_id' => '1',
            'created_at' => '2017-05-25 19:08:59',
        ]);

        DB::table('posts')->insert([
            'title' => 'Audi motor gis bort',
            'body' => '150 hester motor gis bort. Hentes snarest.',
            'img' => 'post/motor.jpg',
            'category_id' => '3',
            'user_id' => '2',
            'created_at' => '2017-05-25 19:10:11',
        ]);

        DB::table('posts')->insert([
            'title' => 'Nokia 3310',
            'body' => 'Gir bort min gamle Nokia 3310 til noen som trenger den.',
            'img' => 'post/nokia.jpg',
            'category_id' => '1',
            'user_id' => '3',
            'created_at' => '2017-05-26 09:11:12',
        ]);

        DB::table('posts')->insert([
            'title' => 'Støvsuger',
            'body' => 'Nesten ny støvsuger gis bort. Kan hentes fortløpende. Ta kontakt.',
            'img' => 'post/stovsuger.jpg',
            'category_id' => '1',
            'user_id' => '1',
            'created_at' => '2017-05-28 12:20:45',
        ]);

        DB::table('posts')->insert([
            'title' => 'Marsvin (Kurt) trenger nytt hjem.',
            'body' => 'Kurt trenger nytt hjem så fort som mulig.',
            'img' => 'post/marsvin.jpg',
            'category_id' => '2',
            'user_id' => '1',
            'created_at' => '2017-05-28 13:45:22',
        ]);
    }
}