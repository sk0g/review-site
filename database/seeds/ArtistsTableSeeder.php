<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            'name'=>"Insomnium",
            'country'=>"Finland"
        ]);
        DB::table('artists')->insert([
            'name'=>"Eluveitie",
            'country'=>"Switzerland"
        ]);
        DB::table('artists')->insert([
            'name'=>"Swallow the Sun",
            'country'=>"Finland"
        ]);
        DB::table('artists')->insert([
            'name'=>"Enslaved",
            'country'=>"Norway"
        ]);

    }
}
