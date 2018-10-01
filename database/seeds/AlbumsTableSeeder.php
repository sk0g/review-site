<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'artist_id'=>1,
            'album_name'=>"Winter's Gate",
            'genre'=>"Melodic death metal",
            'release_year'=>2016,
            'album_art'=>"https://i0.wp.com/www.empireextreme.com/wp-content/uploads/2016/06/insomniumwintersgatecdnew.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>1,
            'album_name'=>"Shadows of the Dying Sun",
            'genre'=>"Melodic death metal",
            'release_year'=>2014,
            'album_art'=>"https://www.nocleansinging.com/wp-content/uploads/2014/04/Insomnium-Shadows-of-the-Dying-Sun1.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>1,
            'album_name'=>"One for Sorrow",
            'genre'=>"Melodic death metal",
            'release_year'=>2011,
            'album_art'=>"https://img.discogs.com/r-s_bFtyvYKu4MgEK0tNQ6m8oV4=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-3244072-1352831842-3373.jpeg.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>2,
            'album_name'=>"Evocation II (Pantheon)",
            'genre'=>"Folk",
            'release_year'=>2017,
            'album_art'=>"https://imagescdn.juno.co.uk/full/CS658338-01A-BIG.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>2,
            'album_name'=>"Origins",
            'genre'=>"Folk metal",
            'release_year'=>2014,
            'album_art'=>"http://www.ghostcultmag.com/wp-content/uploads/2014/08/eluveitie.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>2,
            'album_name'=>"Helvetios",
            'genre'=>"Folk metal",
            'release_year'=>2012,
            'album_art'=>"http://www.drakkarbrasil.com.br/store/1395-thickbox_default/eluveitie-helvetios-cd-dvd.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>2,
            'album_name'=>"Slania",
            'genre'=>"Folk metal",
            'release_year'=>2007,
            'album_art'=>"https://pre00.deviantart.net/5081/th/pre/i/2014/237/7/7/eluveitie___slania__rematered_cover__by_stygiansaviour-d7wneae.png"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>3,
            'album_name'=>"Songs From the North",
            'genre'=>"Doom metal",
            'release_year'=>2017,
            'album_art'=>"http://swallowthesun.net/images/148570ce.album-sftn.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>3,
            'album_name'=>"New Moon",
            'genre'=>"Doom metal",
            'release_year'=>2009,
            'album_art'=>"http://swallowthesun.net/images/6aef020c.album-moon.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>3,
            'album_name'=>"Hope",
            'genre'=>"Doom metal",
            'release_year'=>2007,
            'album_art'=>"http://www.metalmusicarchives.com/images/covers/swallow-the-sun-hope.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>4,
            'album_name'=>"E",
            'genre'=>"Progressive Black metal",
            'release_year'=>2017,
            'album_art'=>"http://enslaved.no/wp-content/uploads/2017/08/Enslaved-E.jpg"
        ]);
        DB::table('albums')->insert([
            'artist_id'=>4,
            'album_name'=>"RUUN",
            'genre'=>"Black metal",
            'release_year'=>2006,
            'album_art'=>"http://enslaved.no/wp-content/uploads/2016/02/Ruun.jpg"
        ]);
    }
}
