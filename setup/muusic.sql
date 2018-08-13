create database muusic;

use muusic;

create table artists
(
  artist_id int unsigned not null auto_increment primary key,
  name char(60) not null,
  bio text not null,
  thumbnail char(60) not null
);

create table albums
(
  album_id int unsigned not null auto_increment primary key,
  title char(60) not null,
  release_date date not null,
  thumbnail char(60) not null,
  artist_id int unsigned not null,
  FOREIGN KEY (artist_id) REFERENCES artists(artist_id)
);

create table songs
(
   song_id int unsigned not null auto_increment primary key,
   title char(100),
   thumbnail char(60) not null,
   artist_id int unsigned not null,
   album_id int unsigned,
   FOREIGN KEY (artist_id) REFERENCES artists(artist_id),
   FOREIGN KEY (album_id) REFERENCES albums(album_id)
);

create table roles
(
  role_id int unsigned not null primary key,
  name char(60) not null
);

create table users
(
  user_id int unsigned not null auto_increment primary key,
  first_name char(60) not null,
  last_name char(60) not null,
  email char(60) not null,
  password char(60) not null,
  role_id int unsigned not null,
  FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

create table reviews
(
  review_id int unsigned not null auto_increment primary key,
  rating int unsigned not null,
  title char(60) not null,
  body char(255) not null,
  user_id int unsigned not null,
  album_id int unsigned not null,
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (album_id) REFERENCES albums(album_id)
);

grant select, insert, update, delete
on book_sc.*
to book_sc@localhost identified by 'password';


-- Populate data

INSERT INTO roles VALUES (1, 'Admin');
INSERT INTO roles VALUES (2, 'Normal');

INSERT INTO users VALUES (1, 'Admin', 'User', 'admin@mail.com', sha1('admin'), 1);
INSERT INTO users VALUES (2, 'Peadar', 'Kelly', 'pkelly504@gmail.com', sha1('password'), 2);
INSERT INTO users VALUES (3, 'Joe', 'Bloggs', 'jbloggs@gmail.com', sha1('password'), 2);

INSERT INTO artists VALUES (1, 'Coldplay', 'After surfacing in 2000 with the breakthrough single Yellow, Coldplay quickly became one of the biggest bands of the new millennium, honing a mix of introspective Brit-pop and anthemic rock that landed the British quartet a near-permanent residence on record charts worldwide.', 'coldplay.jpg');
INSERT INTO artists VALUES (2, 'Ed Sheeran', 'Ed Sheeran may be the quintessential pop star of the 2010s: a singer/songwriter who seems to acknowledge no boundaries between styles or eras, creating a sound thats idiosyncratic and personal. Sheeran borrows from any style that crosses his path', 'ed_sheeran.jpg');
INSERT INTO artists VALUES (3, 'Eminem', 'To call Eminem hip-hops Elvis is correct to a degree, but its largely inaccurate. Certainly, Eminem was the first white rapper since the Beastie Boys to garner both sales and critical respect, but his impact exceeded this confining distinction.', 'eminem.jpg');

-- Coldplay - A Head Full of Dreams
INSERT INTO albums VALUES (1, 'A Head Full Of Dreams', '2015-01-01', 'a_head_full_of_dreams.png', 1);

INSERT INTO songs VALUES (1, 'Adventure of a Lifetime', 'a_head_full_of_dreams.png', 1, 1);
INSERT INTO songs VALUES (2, 'Hymn for the Weekend', 'a_head_full_of_dreams.png', 1, 1);
INSERT INTO songs VALUES (3, 'Everglow', 'a_head_full_of_dreams.png', 1, 1);
INSERT INTO songs VALUES (4, 'A Head Full of Dreams', 'a_head_full_of_dreams.png', 1, 1);
INSERT INTO songs VALUES (5, 'Fun', 'a_head_full_of_dreams.png', 1, 1);

INSERT INTO reviews VALUES (1, 8, 'Return to form for Coldplay', 'After the disappointment of Ghost Stories, it is great to see Coldplay back to their best!', 2, 1);
INSERT INTO reviews VALUES (2, 7, 'Coldplays funnest album yet', 'Youll be smiling throughout', 3, 1);

-- Coldplay - Mylo Xyloto
INSERT INTO albums VALUES (2, 'Mylo Xyloto', '2011-01-01', 'mylo_xyloto.jpg', 1);

INSERT INTO songs VALUES (6, 'Every Teardrop is a Waterfall', 'mylo_xyloto.jpg', 1, 2);
INSERT INTO songs VALUES (7, 'Paradise', 'mylo_xyloto.jpg', 1, 2);
INSERT INTO songs VALUES (8, 'Charlie Brown', 'mylo_xyloto.jpg', 1, 2);
INSERT INTO songs VALUES (9, 'Princess of China', 'mylo_xyloto.jpg', 1, 2);
INSERT INTO songs VALUES (10, 'Hurts Like Heaven', 'mylo_xyloto.jpg', 1, 2);

INSERT INTO reviews VALUES (3, 9, 'Back and better than ever', 'After 3 years off, Coldplay are back with an album that features banger after banger', 2, 2);
INSERT INTO reviews VALUES (4, 9, 'Collaborations all round', 'It is not often we see Coldplay collaborate, but this album shows that they should do it more often', 3, 2);

-- Coldplay - Viva La Vida Or Death And All His Friends
INSERT INTO albums VALUES (3, 'Viva La Vida Or Death And All His Friends', '2008-01-01', 'viva_la_vida.jpg', 1);

INSERT INTO songs VALUES (11, 'Viva la Vida', 'viva_la_vida.jpg', 1, 3);
INSERT INTO songs VALUES (12, 'Violet Hill', 'viva_la_vida.jpg', 1, 3);
INSERT INTO songs VALUES (13, 'Lost', 'viva_la_vida.jpg', 1, 3);
INSERT INTO songs VALUES (14, 'Life in Technicolor', 'viva_la_vida.jpg', 1, 3);

INSERT INTO reviews VALUES (5, 10, 'One of the greats', 'The title track may go down as the bands great single yet', 2, 3);
INSERT INTO reviews VALUES (6, 9, 'Album of the year', 'A darker tone pays off for the British band', 3, 3);

-- Ed Sheeran - Plus
INSERT INTO albums VALUES (4, 'Plus', '2011-01-01', 'plus.png', 2);

INSERT INTO songs VALUES (15, 'The A Team', 'plus.png', 2, 4);
INSERT INTO songs VALUES (16, 'Small Bump', 'plus.png', 2, 4);
INSERT INTO songs VALUES (17, 'Lego House', 'plus.png', 2, 4);
INSERT INTO songs VALUES (18, 'Give Me Love', 'plus.png', 2, 4);
INSERT INTO songs VALUES (19, 'Drunk', 'plus.png', 2, 4);

INSERT INTO reviews VALUES (7, 6, 'Watch this space', 'A solid debut from the English lad. Expect bright things in the future', 2, 4);
INSERT INTO reviews VALUES (8, 6, 'New star alert', 'Have we found out next superstar... I think so', 3, 4);

-- Ed Sheeran - Multiply
INSERT INTO albums VALUES (5, 'Multiply', '2014-01-01', 'multiply.png', 2);

INSERT INTO songs VALUES (20, 'Sing', 'multiply.png', 2, 5);
INSERT INTO songs VALUES (21, 'Photograph', 'multiply.png', 2, 5);
INSERT INTO songs VALUES (22, 'Bloodstream', 'multiply.png', 2, 5);
INSERT INTO songs VALUES (23, 'Thinking Out Loud', 'multiply.png', 2, 5);
INSERT INTO songs VALUES (24, 'I See Fire', 'multiply.png', 2, 5);

INSERT INTO reviews VALUES (9, 7, 'A set back', 'After his breakout success 3 years ago, it is a shame that this album doesnt reach the same heights as Plus', 2, 5);
INSERT INTO reviews VALUES (10, 9, 'What could have been', 'You can do better, Ed', 3, 5);

-- Ed Sheeran - Divide
INSERT INTO albums VALUES (6, 'Divide', '2017-01-01', 'divide.png', 2);

INSERT INTO songs VALUES (25, 'Shape of You', 'divide.png', 2, 6);
INSERT INTO songs VALUES (26, 'Castle on the Hill', 'divide.png', 2, 6);
INSERT INTO songs VALUES (27, 'Perfect', 'divide.png', 2, 6);
INSERT INTO songs VALUES (28, 'Galway Girl', 'divide.png', 2, 6);
INSERT INTO songs VALUES (29, 'Dive', 'divide.png', 2, 6);

INSERT INTO reviews VALUES (11, 8, 'A Perfect Return', 'Ed has back with an album that has the potential to shatter records everywhere.', 3, 6);

-- Eminem - The Eminem Show
INSERT INTO albums VALUES (7, 'The Eminem Show', '2002-01-01', 'the_eminem_show.jpg', 3);

INSERT INTO songs VALUES (30, 'Without Me', 'the_eminem_show.jpg', 3, 7);
INSERT INTO songs VALUES (31, 'Cleanin out my Closet', 'the_eminem_show.jpg', 3, 7);
INSERT INTO songs VALUES (32, 'Superman', 'the_eminem_show.jpg', 3, 7);

INSERT INTO reviews VALUES (12, 10, 'The undisputed king of rap', 'One of the all time great rap albums that everyone should experience', 2, 7);
INSERT INTO reviews VALUES (13, 9, 'Twisted', 'Slim shady lets us in on some on his secrets', 3, 7);