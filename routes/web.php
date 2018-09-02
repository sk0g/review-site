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
    $album_review_data = get_review_count($id);
    $review_count = $album_review_data->count;
    $review_average = $album_review_data->score;

    return view('album_details')
        ->withDetails($album_details[0])
        ->withReviews($album_reviews)
        ->withReviewCount($review_count)
        ->withReviewAverage($review_average);
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

Route::get('/edit_album/{id}', function($id) {
    $album = get_album_details($id)[0];
    return view('/add_album')
        ->withAlbum($album);
});

Route::get('/most_reviewed', function() {
    $albums = get_most_reviewed_albums();
    return view('most_reviewed')
        ->withCriteria("Reviews: ")
        ->withAlbums($albums);
});

Route::get('/best_albums', function() {
    $albums = get_best_reviewed_albums();
    return view('best_reviewed')
        ->withCriteria("Reviews: ")
        ->withCriteria2("Average Rating: ")
        ->withAlbums($albums);
});

Route::get('/bands', function() {
    $bands = get_bands();
    return view('bands')
        ->withBands($bands);
});

Route::get('/band_albums/{id}', function($id) {
    $albums = get_albums_for_artist($id);
    return view('welcome')
        ->withAlbums($albums);
});

Route::get('/add_album', function() {
    return view('/add_album');
});

Route::get('/documentation', function() {
    return view('documentation');
});

Route::post('/add_review', function() {
    $album_id = request()->album_id;
    $review_status = process_review_request(request()->all());
    if ($review_status == "update") {
        return redirect("/album_details/$album_id")
            ->withAlert("You have already reviewed this. Updating review.");
    } elseif ($review_status == "invalid") {
        return redirect("/album_details/$album_id")
            ->withAlert("Please fill out all fields before submitting.");
    } else {
        return redirect("/album_details/$album_id")
            ->withAlert("Review added.");
    }
});


Route::post('/add_album', function() {
    $artist_name = request()->name;

    $artist_id = attempt_fetching_artist_id($artist_name);
    if ($artist_id == false) {
        return redirect('/')
            ->withAlert("Artist not found. Adding new artists isn't currently supported");
    } else {
        $add_album_status = process_new_album_request(request()->all());
        if ($add_album_status) {
            return redirect('/')
                ->withAlert("Album added!");
        } else {
            return redirect('/')
                ->withAlert('Album failed to add. Did you fill in all the fields properly?');
        }
    }
});

function get_review_count($id) {
    // Returns the number of reviews an album has
    $sql = "SELECT count(id) as count, avg(score) as score
            FROM reviews
            WHERE album_id = $id";
    return DB::select($sql)[0];
}

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
    // id, album_id, Name, Comment
    // ->id is possibly null, have to check for that

    // check if entry with album_id and name exists
    $album_id = $req['album_id'];
    $comment  = $req['Comment'];
    $name     = $req['Name'];
    // if the fields are null, return early as we can't add into the database
    if ($name == null || $comment == null || !array_key_exists('score', $req)) {
        return "invalid";
    }

    $score    = $req['score'];
    $sql = "SELECT id
            FROM reviews
            WHERE album_id = ?
            AND name = ?";
    $matches = DB::select($sql, array($album_id, $name));
    // update the entry if it does
    if ($matches >= 1 and $matches != null) {
        $sql = "UPDATE reviews
                SET id = ?, name = ?, score = ?,
                album_id = ?, comment = ?
                WHERE name = ? and album_id = ?";
        DB::update($sql, array($matches[0]->id, $name, $score, $album_id,
                               $comment, $name, $album_id));
        return "update";
    }
    // create a new entry otherwise
    else {
        $sql = "INSERT INTO reviews VALUES(NULL,
                ?, ?, ?, ?)";
        DB::insert($sql, array($name, $score, $album_id, $comment));
        return "new";
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

function get_most_reviewed_albums() {
    // Return a list with all albums, alongside the number of reviews for each of them
    $sql = "SELECT artists.name, release_year, album_art, albums.album_id, album_name, COUNT(reviews.id) AS 'count'
            FROM albums
                LEFT JOIN reviews on albums.album_id = reviews.album_id
                LEFT JOIN artists on albums.artist_id = artists.id
            WHERE artists.id = albums.artist_id
            GROUP BY albums.album_id
            ORDER BY count DESC";
    return DB::select($sql);
}

function get_best_reviewed_albums() {
    // Return albums with the highest average review score
    $sql = "SELECT artists.name, release_year, album_art, albums.album_id, album_name, AVG(reviews.score) AS average_score, COUNT(reviews.id) AS 'count'
            FROM albums
                LEFT JOIN reviews on albums.album_id = reviews.album_id
                LEFT JOIN artists on albums.artist_id = artists.id
            WHERE artists.id = albums.artist_id
            GROUP BY albums.album_id
            ORDER BY average_score DESC";
    return DB::select($sql);
}

function get_bands() {
    // Get all bands
    $sql = "SELECT *
            FROM artists";
    return DB::select($sql);
}

function get_albums_for_artist($id) {
    // Get all albums of a specific artist
    $sql = "SELECT * FROM albums, artists
            WHERE albums.artist_id = artists.id
            AND artists.id = ?";
    return DB::select($sql, array($id));
}

function attempt_fetching_artist_id($name) {
    // Tries to return the artist's id, else returns false, given an artist's name
    $sql = "SELECT id
            FROM artists
            WHERE name = ?";
    $result = DB::select($sql, array($name));

    if ($result == null) {
        return false;
    } else {
        return $result[0]->id;
    }
}

function process_new_album_request($values) {
    // Try to add a new album. If failed, return false, else return true
    /*  "album_id" => "1"
        "name" => "Insomnium"
        "album_name" => "Winter's Gate"
        "genre" => "Melodic death metal"
        "release_year" => "2016"
        "album_art" => "https://i0.wp.com/www.empireextreme.com/wp-content/uploads/2016/06/insomniumwintersgatecdnew.jpg"
    */
    $artist_name = $values['name'];
    $album_name = $values['album_name'];
    $genre = $values['genre'];
    $release_year = $values['release_year'];
    $album_art = $values['album_art'];

    // If any fields are null, can't add into database. Return early.
    if ($album_name == null ||
        $artist_name == null ||
        $genre == null ||
        $release_year == null ||
        $album_art == null) {
        return false;
    }

    // If artist id number is not found, can't add into database. Return early.
    $artist_id = attempt_fetching_artist_id($artist_name);
    if ($artist_id == null) {
        return false;
    }

    $sql = "SELECT album_id
            FROM albums
            WHERE artist_id = ?
            AND album_name = ?";
    $matches = DB::select($sql, array($artist_id, $album_name));
    // If already in database, update instead
    if ($matches >= 1 and $matches != null) {
        $sql = "UPDATE albums
                SET album_name = ?, genre = ?, release_year = ?, album_art = ?
                WHERE album_id = ?";
        DB::update($sql, array($album_name, $genre, $release_year, $album_art, $matches[0]->album_id));
        return true;
    }

    // Else create a new entry
    else {
        $sql = "INSERT INTO albums VALUES(NULL,
                ?, ?, ?, ?, ?)";
        DB::insert($sql, array($artist_id, $album_name, $genre, $release_year, $album_art));
        return true;
    }
}