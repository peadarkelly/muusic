create database muusic;

use muusic;

create table artists
(
  artist_id int unsigned not null auto_increment primary key,
  name char(60) not null,
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
   spotify_link char(100) not null,
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

INSERT INTO artists VALUES (1, 'Coldplay', 'coldplay.jpg');
INSERT INTO artists VALUES (2, 'Ed Sheeran', 'ed_sheeran.jpg');
INSERT INTO artists VALUES (3, 'Eminem', 'eminem.jpg');
INSERT INTO artists VALUES (4, 'Beyonce', 'beyonce.jpeg');

-- Coldplay - A Head Full of Dreams
INSERT INTO albums VALUES (1, 'A Head Full Of Dreams', '2015-12-04', 'a_head_full_of_dreams.png', 1);

INSERT INTO songs VALUES (1, 'Adventure of a Lifetime', 'https://open.spotify.com/track/69uxyAqqPIsUyTO8txoP2M?si=92YvXSImQOyDRjUqEK-Ugw', 'a_head_full_of_dreams.png', 1, 1);
INSERT INTO songs VALUES (2, 'Hymn for the Weekend', 'https://open.spotify.com/track/3RiPr603aXAoi4GHyXx0uy?si=RUxIFOhORLerhuZnsaYjhw', 'a_head_full_of_dreams.png', 1, 1);
INSERT INTO songs VALUES (3, 'Everglow', 'https://open.spotify.com/track/5qfZRNjt2TkHEL12r3sDEU?si=Y3SyH40HT1Czq7qe7f85Aw', 'a_head_full_of_dreams.png', 1, 1);
INSERT INTO songs VALUES (4, 'A Head Full of Dreams', 'https://open.spotify.com/track/6f49kbOuQSOsStBpyGvQfA?si=i6StO0qkRGGD8djria1e4g', 'a_head_full_of_dreams.png', 1, 1);
INSERT INTO songs VALUES (5, 'Fun', 'https://open.spotify.com/track/7fJFDK6XjYsXcMKNHESbot?si=tBGOXFp3TBqxYnK4sbmhLA', 'a_head_full_of_dreams.png', 1, 1);

INSERT INTO reviews VALUES (1, 8, 'Return to form for Coldplay', 'After the disappointment of Ghost Stories, it is great to see Coldplay back to their best!', 2, 1);
INSERT INTO reviews VALUES (2, 7, 'Coldplays funnest album yet', 'Youll be smiling throughout', 3, 1);

-- Coldplay - Mylo Xyloto
INSERT INTO albums VALUES (2, 'Mylo Xyloto', '2011-10-19', 'mylo_xyloto.jpg', 1);

INSERT INTO songs VALUES (6, 'Every Teardrop is a Waterfall', 'https://open.spotify.com/track/2U8g9wVcUu9wsg6i7sFSv8?si=RQsO4qQFTC2lelKPxEcWZw', 'mylo_xyloto.jpg', 1, 2);
INSERT INTO songs VALUES (7, 'Paradise', 'https://open.spotify.com/track/6nek1Nin9q48AVZcWs9e9D?si=g-m3N-BRTkOw1PB7UmvS3g', 'mylo_xyloto.jpg', 1, 2);
INSERT INTO songs VALUES (8, 'Charlie Brown', 'https://open.spotify.com/track/1yqMgZNrevsWMLWfO2PRp5?si=7ahnvtjzQ4mxRUUHkdksXQ', 'mylo_xyloto.jpg', 1, 2);
INSERT INTO songs VALUES (9, 'Princess of China', 'https://open.spotify.com/track/4HXOBjwv2RnLpGG4xWOO6N?si=3BQnH00XTbe4fUzFIgjg-Q', 'mylo_xyloto.jpg', 1, 2);
INSERT INTO songs VALUES (10, 'Hurts Like Heaven', 'https://open.spotify.com/track/6WF4hzdGXvXd1joERSXJjm?si=BW9y50dyQsCH-DjLmIxFAA', 'mylo_xyloto.jpg', 1, 2);

INSERT INTO reviews VALUES (3, 9, 'Back and better than ever', 'After 3 years off, Coldplay are back with an album that features banger after banger', 2, 2);
INSERT INTO reviews VALUES (4, 9, 'Collaborations all round', 'It is not often we see Coldplay collaborate, but this album shows that they should do it more often', 3, 2);

-- Coldplay - Viva La Vida Or Death And All His Friends
INSERT INTO albums VALUES (3, 'Viva La Vida Or Death And All His Friends', '2008-06-12', 'viva_la_vida.jpg', 1);

INSERT INTO songs VALUES (11, 'Viva la Vida', 'https://open.spotify.com/track/4zOfy9kqJlG0ZXvcaSh4gv?si=Z63TsfviT6aCc5LarXCGZg', 'viva_la_vida.jpg', 1, 3);
INSERT INTO songs VALUES (12, 'Violet Hill', 'https://open.spotify.com/track/2wToK3W4tScxgpAinchUYf?si=IN6apK0vRI2fp1FZnFEu3g', 'viva_la_vida.jpg', 1, 3);
INSERT INTO songs VALUES (13, 'Lost', 'https://open.spotify.com/track/1QHphxPdPZPtYeXKY3abJp?si=wlFaGUjfRf6NxF6qa-FHrg', 'viva_la_vida.jpg', 1, 3);
INSERT INTO songs VALUES (14, 'Life in Technicolor', 'https://open.spotify.com/track/1cErN1ZX9s0uZaaWezEGJw?si=uvMquiamSf2bgek1VAOIYw', 'viva_la_vida.jpg', 1, 3);

INSERT INTO reviews VALUES (5, 10, 'One of the greats', 'The title track may go down as the bands great single yet', 2, 3);
INSERT INTO reviews VALUES (6, 9, 'Album of the year', 'A darker tone pays off for the British band', 3, 3);

-- Ed Sheeran - Plus
INSERT INTO albums VALUES (4, 'Plus', '2011-09-09', 'plus.png', 2);

INSERT INTO songs VALUES (15, 'The A Team', 'https://open.spotify.com/track/1XpYodsD36XN7ygcdF7mJJ?si=KQiJYAP9TVeNqaVPBunvEw', 'plus.png', 2, 4);
INSERT INTO songs VALUES (16, 'Small Bump', 'https://open.spotify.com/track/4z1O25cq9g2kuJemmUxc21?si=1g6nwjeDSoKFJ-r-kqMO4g', 'plus.png', 2, 4);
INSERT INTO songs VALUES (17, 'Lego House', 'https://open.spotify.com/track/5ubHAQtKuFfiG4FXfLP804?si=Y_SBn73GS8OE_FB7bk2vlg', 'plus.png', 2, 4);
INSERT INTO songs VALUES (18, 'Give Me Love', 'https://open.spotify.com/track/0SuG9kyzGRpDqrCWtgD6Lq?si=WZkG7K-_RNGmBfpxQrVwUA', 'plus.png', 2, 4);
INSERT INTO songs VALUES (19, 'Drunk', 'https://open.spotify.com/track/4RnCPWlBsY7oUDdyruod7Y?si=5ifg8LCHTdGobJSRZIcRpg', 'plus.png', 2, 4);

INSERT INTO reviews VALUES (7, 6, 'Watch this space', 'A solid debut from the English lad. Expect bright things in the future', 2, 4);
INSERT INTO reviews VALUES (8, 6, 'New star alert', 'Have we found out next superstar... I think so', 3, 4);

-- Ed Sheeran - Multiply
INSERT INTO albums VALUES (5, 'Multiply', '2014-06-20', 'multiply.png', 2);

INSERT INTO songs VALUES (20, 'Sing', 'https://open.spotify.com/track/6K8qKeWo5MsFED7wCR6Kop?si=KxR4yB5jSdqwd2p2pm_aFg', 'multiply.png', 2, 5);
INSERT INTO songs VALUES (21, 'Photograph', 'https://open.spotify.com/track/1HNkqx9Ahdgi1Ixy2xkKkL?si=gNE5ylaySma9cmT1bD3s0g', 'multiply.png', 2, 5);
INSERT INTO songs VALUES (22, 'Bloodstream', 'https://open.spotify.com/track/5v4sZRuvWDcisoOk1PFv6T?si=FNvaCGToSXCEn8637GqVkA', 'multiply.png', 2, 5);
INSERT INTO songs VALUES (23, 'Thinking Out Loud', 'https://open.spotify.com/track/34gCuhDGsG4bRPIf9bb02f?si=I7SoQJ4uTNO9XOFbOdMcPw', 'multiply.png', 2, 5);
INSERT INTO songs VALUES (24, 'I See Fire', 'https://open.spotify.com/track/5pY3ovFxbvAg7reGZjJQSp?si=EJx8tFBqTwSgCX463B_U8g', 'multiply.png', 2, 5);

INSERT INTO reviews VALUES (9, 7, 'A set back', 'After his breakout success 3 years ago, it is a shame that this album doesnt reach the same heights as Plus', 2, 5);
INSERT INTO reviews VALUES (10, 9, 'What could have been', 'You can do better, Ed', 3, 5);

-- Ed Sheeran - Divide
INSERT INTO albums VALUES (6, 'Divide', '2017-03-03', 'divide.png', 2);

INSERT INTO songs VALUES (25, 'Shape of You', 'https://open.spotify.com/track/7qiZfU4dY1lWllzX7mPBI3?si=6FyFZnreTiuWBPPr20dQoQ', 'divide.png', 2, 6);
INSERT INTO songs VALUES (26, 'Castle on the Hill', 'https://open.spotify.com/track/6PCUP3dWmTjcTtXY02oFdT?si=wf-RieMuQ_-8Fs0aQWMJsw', 'divide.png', 2, 6);
INSERT INTO songs VALUES (27, 'Perfect', 'https://open.spotify.com/track/0tgVpDi06FyKpA1z0VMD4v?si=cCs84dQmSyuE1pkqLZ55qg', 'divide.png', 2, 6);
INSERT INTO songs VALUES (28, 'Galway Girl', 'https://open.spotify.com/track/0afhq8XCExXpqazXczTSve?si=5D5tOxu3So-P-hwqnxbkIQ', 'divide.png', 2, 6);
INSERT INTO songs VALUES (29, 'Dive', 'https://open.spotify.com/track/51ChrwmUPDJvedPQnIU8Ls?si=DZHpwzNVRv-Ju7fkxTi7vw', 'divide.png', 2, 6);

INSERT INTO reviews VALUES (11, 8, 'A Perfect Return', 'Ed has back with an album that has the potential to shatter records everywhere.', 3, 6);

-- Eminem - The Eminem Show
INSERT INTO albums VALUES (7, 'The Eminem Show', '2002-05-26', 'the_eminem_show.jpg', 3);

INSERT INTO songs VALUES (30, 'Without Me', 'https://open.spotify.com/track/7lQ8MOhq6IN2w8EYcFNSUk?si=UENyLtfxQXawukOB0aewGQ', 'the_eminem_show.jpg', 3, 7);
INSERT INTO songs VALUES (31, 'Cleanin out my Closet', 'https://open.spotify.com/track/7BMO7O7ImjV8HNTH74Tshv?si=ImIl9ilHRJOXLYb5dlgqAg', 'the_eminem_show.jpg', 3, 7);
INSERT INTO songs VALUES (32, 'Superman', 'https://open.spotify.com/track/4woTEX1wYOTGDqNXuavlRC?si=7ce0TruVS2qVPaQ9fsBudA', 'the_eminem_show.jpg', 3, 7);

INSERT INTO reviews VALUES (12, 10, 'The undisputed king of rap', 'One of the all time great rap albums that everyone should experience', 2, 7);
INSERT INTO reviews VALUES (13, 9, 'Twisted', 'Slim shady lets us in on some on his secrets', 3, 7);