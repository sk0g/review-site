<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $albums = get_all_albums();
    return view('welcome')
        ->withAlbums($albums);
});

Route::get('/album_details/{id}', function($id) {
    $album_details = get_album_details($id);
    $album_reviews = get_album_reviews($id);

    return view('album_details')
        ->withDetails($album_details[0])
        ->withReviews($album_reviews);
});

Route::get('/test_db', function() {
    // Dumps the database, to verify db functionality
    $sql = "SELECT * FROM albums, artists WHERE albums.artist_id = artists.id";
    $items = DB::select($sql);
    dump($items);
});

Route::get('/delete_item/{id}', function($id) {
    delete_album($id);
    delete_reviews_for_post($id);

    return redirect('/');
});

function get_all_albums() {
    // Returns all albums from the database
    $sql = "SELECT * FROM albums, artists WHERE albums.artist_id = artists.id";
    $albums = DB::select($sql);
    return $albums;
}

function get_album_details($id) {
    // Returns album details
    $sql = "SELECT * FROM albums, artists
            WHERE albums.artist_id = artists.id
            AND album_id=?";
    return DB::select($sql, array($id));
}

function get_album_reviews($id) {
    // Returns the reviews for an album
    $sql = "SELECT * FROM reviews
            WHERE album_id=?";
    return DB::select($sql, array($id));
}

function delete_album($id) {
    // Deletes the album with a specific id
    $sql = "DELETE FROM albums WHERE album_id=?";
    DB::delete($sql, array($id));
}

function delete_reviews_for_post($id) {
    // Deletes the reviews for a specific album
    $sql = "DELETE FROM reviews WHERE album_id=?";
    DB::delete($sql, array($id));
}
