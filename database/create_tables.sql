DROP TABLE IF EXISTS albums;
CREATE TABLE albums (
    album_id        integer         not null    primary key autoincrement,
    artist_id       integer         not null,
    album_name      varchar(80)     not null,
    genre           text            not null,
    release_year    integer         not null,
    album_art       text            not null
);
DROP TABLE IF EXISTS artists;
CREATE TABLE artists (
    id      integer     not null    primary key autoincrement,
    name    varchar(80) not null,
    country varchar(40) not null
);
DROP TABLE IF EXISTS reviews;
CREATE TABLE reviews (
    id          integer     not null    primary key autoincrement,
    name        varchar(40) not null,
    score       integer     not null    CHECK (score >= 1 AND score <= 5),
    album_id    integer     not null,
    comment     text        not null
);

INSERT INTO albums VALUES(NULL, 1, "Winter's Gate", "Melodic death metal", 2016, "https://i0.wp.com/www.empireextreme.com/wp-content/uploads/2016/06/insomniumwintersgatecdnew.jpg");
INSERT INTO albums VALUES(NULL, 1, "Shadows of the Dying Sun", "Melodic death metal", 2014, "https://www.nocleansinging.com/wp-content/uploads/2014/04/Insomnium-Shadows-of-the-Dying-Sun1.jpg");
INSERT INTO albums VALUES(NULL, 1, "One for Sorrow", "Melodic death metal", 2011, "https://img.discogs.com/r-s_bFtyvYKu4MgEK0tNQ6m8oV4=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-3244072-1352831842-3373.jpeg.jpg");

INSERT INTO albums VALUES(NULL, 2, "Evocation II (Pantheon)", "Folk", 2017, "https://imagescdn.juno.co.uk/full/CS658338-01A-BIG.jpg");
INSERT INTO albums VALUES(NULL, 2, "Origins", "Folk metal", 2014, "http://www.ghostcultmag.com/wp-content/uploads/2014/08/eluveitie.jpg");
INSERT INTO albums VALUES(NULL, 2, "Helvetios", "Folk metal", 2012, "http://www.drakkarbrasil.com.br/store/1395-thickbox_default/eluveitie-helvetios-cd-dvd.jpg");
INSERT INTO albums VALUES(NULL, 2, "Slania", "Folk metal", 2007, "https://pre00.deviantart.net/5081/th/pre/i/2014/237/7/7/eluveitie___slania__rematered_cover__by_stygiansaviour-d7wneae.png");

INSERT INTO albums VALUES(NULL, 3, "Songs From the North", "Doom metal", 2017, "http://swallowthesun.net/images/148570ce.album-sftn.jpg");
INSERT INTO albums VALUES(NULL, 3, "New Moon", "Doom metal", 2009, "http://swallowthesun.net/images/6aef020c.album-moon.jpg");
INSERT INTO albums VALUES(NULL, 3, "Hope", "Doom metal", 2007, "http://www.metalmusicarchives.com/images/covers/swallow-the-sun-hope.jpg");

INSERT INTO albums VALUES(NULL, 4, "E", "Progressive Black metal", 2017, "http://enslaved.no/wp-content/uploads/2017/08/Enslaved-E.jpg");
INSERT INTO albums VALUES(NULL, 4, "RUUN", "Black metal", 2006, "http://enslaved.no/wp-content/uploads/2016/02/Ruun.jpg");

INSERT INTO artists VALUES(NULL, "Insomnium", "Finland");
INSERT INTO artists VALUES(NULL, "Eluveitie", "Switzerland");
INSERT INTO artists VALUES(NULL, "Swallow the Sun", "Finland");
INSERT INTO artists VALUES(NULL, "Enslaved", "Norway");

INSERT INTO reviews VALUES(NULL, "Mikko", 5, 1, "Album of the year surely?!");
INSERT INTO reviews VALUES(NULL, "Henry", 4, 1, "Jawdropping");

INSERT INTO reviews VALUES(NULL, "Frost", 4, 2, "Gets a little drawn out at times, but a solid album.");
INSERT INTO reviews VALUES(NULL, "Teemu", 5, 2, "WHOA");

INSERT INTO reviews VALUES(NULL, "Frost", 5, 3, "Made me cry, would listen to again.");
INSERT INTO reviews VALUES(NULL, "Johan", 5, 3, "Surprisingly brutal, delightfully cold.");
INSERT INTO reviews VALUES(NULL, "Sven", 4, 3, "I would like to hear more growls on the next album");

INSERT INTO reviews VALUES(NULL, "Skog", 4, 4, "A bit different, but groovy nevertheless.");
INSERT INTO reviews VALUES(NULL, "Adam", 1, 4, "Is this even metal?!");

INSERT INTO reviews VALUES(NULL, "Varg", 4, 5, "Could do with more drums if I'm being honest, but still a great album.");
INSERT INTO reviews VALUES(NULL, "Frost", 2, 5, "A flute? In my metal?! No way.");

INSERT INTO reviews VALUES(NULL, "Teemu", 5, 6, "Folk metal doesn't get much better than this.");

INSERT INTO reviews VALUES(NULL, "Sven", 4, 8, "Amazing start to finish, though it goes for 3 hours!");

INSERT INTO reviews VALUES(NULL, "Varg", 5, 9, "Is this what having a heart attack feels like?!");

INSERT INTO reviews VALUES(NULL, "Adam", 4, 10, "This is sick! Listening to more of their stuff now.");
INSERT INTO reviews VALUES(NULL, "Sk0g", 2, 10, "I 'hope' the next album is better. heh.");

INSERT INTO reviews VALUES(NULL, "Frost", 5, 11, "äter du fisk?");