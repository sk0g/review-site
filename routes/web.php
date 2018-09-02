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
    $sql = "SELECT * FROM albums, artists, reviews
            WHERE albums.artist_id = artists.id
            AND reviews.album_id = albums.album_id";
    $items = DB::select($sql);
    dump($items);
});

Route::get('/delete_item/{id}', function($id) {
    delete_album($id);
    delete_reviews_for_post($id);

    return redirect('/');
});

Route::get('/add_review/{id}', function($id) {
    return view('add_review')
        ->withAlbumId($id);
});

Route::get('/edit_review/{id}', function($id) {
    $review = get_review($id);
    return view('add_review')
        ->withReview($review)
        ->withAlbumId($review->album_id);
});

Route::post('/add_review', function() {
    $album_id = request()->album_id;
    process_review_request(request()->all());
    return redirect("/album_details/$album_id");
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

function get_review($id) {
    // Returns a specific review, given an id
    $sql = "SELECT * FROM reviews
            WHERE id = ?";
    $review = DB::select($sql, array($id));
    return $review[0];
}

function process_review_request($req) {
    //
    // id, album_id, Name, Comment
    // ->id is possibly null, have to check for that

    // check if entry with album_id and name exists
    $album_id = $req['album_id'];
    $score    = $req['score'];
    $comment  = $req['Comment'];
    $name     = $req['Name'];
    $sql = "SELECT id
            FROM reviews
            WHERE album_id = ?
            AND name = ?";
    $matches = DB::select($sql, array($album_id, $name));
    // update the entry if it does
    if ($matches >= 1) {
        $sql = "UPDATE reviews
                SET id = ?, name = ?, score = ?,
                album_id = ?, comment = ?
                WHERE name = ? and album_id = ?";
        DB::update($sql, array($matches[0]->id, $name, $score, $album_id,
                               $comment, $name, $album_id));
    }
    // create a new entry otherwise
    else {
        $sql = "INSERT INTO reviews VALUES(NULL,
                ?, ?, ?, ?";
        DB::insert($sql, array($name, $score, $album_id, $comment));
    }
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
