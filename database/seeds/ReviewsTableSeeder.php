<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'name'=>"Mikko",
            'score'=>5,
            'album_id'=>1,
            'comment'=>"Album of the year surely?!"
        ]);
        DB::table('reviews')->insert([
            'name'=>"Henry",
            'score'=>4,
            'album_id'=>1,
            'comment'=>"Jawdropping"
        ]);
        DB::table('reviews')->insert([
            'name'=>"Frost",
            'score'=>4,
            'album_id'=>2,
            'comment'=>"Gets a little drawn out at times, but a solid album."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Teemu",
            'score'=>5,
            'album_id'=>2,
            'comment'=>"WHOA"
        ]);
        DB::table('reviews')->insert([
            'name'=>"Frost",
            'score'=>5,
            'album_id'=>3,
            'comment'=>"Made me cry, would listen to again."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Johan",
            'score'=>5,
            'album_id'=>3,
            'comment'=>"Surprisingly brutal, delightfully cold."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Sven",
            'score'=>4,
            'album_id'=>3,
            'comment'=>"I would like to hear more growls on the next album"
        ]);
        DB::table('reviews')->insert([
            'name'=>"Skog",
            'score'=>4,
            'album_id'=>4,
            'comment'=>"A bit different, but groovy nevertheless."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Adam",
            'score'=>1,
            'album_id'=>4,
            'comment'=>"Is this even metal?!"
        ]);
        DB::table('reviews')->insert([
            'name'=>"Varg",
            'score'=>4,
            'album_id'=>5,
            'comment'=>"Could do with more drums if I'm being honest, but still a great album."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Frost",
            'score'=>2,
            'album_id'=>5,
            'comment'=>"A flute? In my metal?! No way."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Teemu",
            'score'=>5,
            'album_id'=>6,
            'comment'=>"Folk metal doesn't get much better than this."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Sven",
            'score'=>4,
            'album_id'=>8,
            'comment'=>"Amazing start to finish, though it goes for 3 hours!"
        ]);
        DB::table('reviews')->insert([
            'name'=>"Varg",
            'score'=>5,
            'album_id'=>9,
            'comment'=>"Is this what having a heart attack feels like?!"
        ]);
        DB::table('reviews')->insert([
            'name'=>"Adam",
            'score'=>4,
            'album_id'=>10
            'comment'=> "This is sick! Listening to more of their stuff now."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Sk0g",
            'score'=>2,
            'album_id'=>10
            'comment'=> "I 'hope' the next album is better. heh."
        ]);
        DB::table('reviews')->insert([
            'name'=>"Frost",
            'score'=>5,
            'album_id'=>11
            'comment'=> "äter du fisk?"
        ]);
    }
}
