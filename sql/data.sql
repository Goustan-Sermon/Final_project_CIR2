--DELETE FROM public.Utilisateur;
DELETE FROM public.Morceau_Playlist WHERE id_morceau BETWEEN 1 AND 100000;
DELETE FROM public.Playlist WHERE id_playlist BETWEEN 1 AND 100000;
DELETE FROM public.Morceau_Artiste WHERE id_morceau BETWEEN 1 AND 100000;
DELETE FROM public.Morceau WHERE id_morceau BETWEEN 1 AND 100000;
DELETE FROM public.Album WHERE id_album BETWEEN 1 AND 100000;
DELETE FROM public.Artiste WHERE id_artiste BETWEEN 1 AND 100000;
DELETE FROM public.Types_Artistes WHERE id_type BETWEEN 1 AND 100000;
DELETE FROM public.Styles_Musicaux WHERE id_style BETWEEN 1 AND 100000;


ALTER SEQUENCE styles_musicaux_id_style_seq RESTART;
INSERT INTO styles_musicaux(style) VALUES ('Drill'), ('Rap'), ('Pop'), ('Classique'), ('Hip-Hop'), ('Variétés Française');

ALTER SEQUENCE types_artistes_id_type_seq RESTART;
INSERT INTO types_artistes(type_artiste) VALUES ('Chanteur'), ('DJ'), ('Groupe');

ALTER SEQUENCE artiste_id_artiste_seq RESTART;
INSERT INTO artiste(nom_artiste, id_type) VALUES ('Travis Scott', 1), ('Orelsan',1), ('Central Cee',1);

ALTER SEQUENCE album_id_album_seq RESTART;
INSERT INTO Album(titre_album, date_parution, image_album, id_artiste, id_style) VALUES 
('JACK BOYS','2019-12-27','https://i.scdn.co/image/ab67616d0000b273dfc2f59568272de50a257f2f',1,1), 
('ASTRO WORLD','2018-08-03','https://i.scdn.co/image/ab67616d0000b273072e9faef2ef7b6db63834a3',1,1), 
('Perdu d''Avance','2009-02-16','https://i.scdn.co/image/ab67616d0000b2730b2e3999b189fa2a8a6a752f',2,2),
('Le chant des sirènes','2011-09-26','https://i.scdn.co/image/ab67616d0000b27342a91184c215f8a95b5f77ec',2,2), 
('23','2022-02-25','https://i.scdn.co/image/ab67616d0000b273e1f05c994777b79bc5c87547',3,1);

ALTER SEQUENCE morceau_id_morceau_seq RESTART;
--ALBUM TRAVIS SCOTT JACK BOYS
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES 
('HIGHEST IN THE ROOM',244,1,'https://p.scdn.co/mp3-preview/2d4113dd008f19cd24e08c2e34ee9be93d90375e?cid=e1a970b4eb69499cb0dff383f57387b1'),
('GANG GANG',244,1,'https://p.scdn.co/mp3-preview/141c6ad419a080ca81a44bac636e8b4bedb9ac94?cid=e1a970b4eb69499cb0dff383f57387b1'),
('HAD ENOUGH',157,1,'https://p.scdn.co/mp3-preview/4482742c2c6cc7968066d7476d8a4ff448b222b4?cid=e1a970b4eb69499cb0dff383f57387b1'),
('OUT WEST',157,1,'https://p.scdn.co/mp3-preview/63aafaebdbc7655a5c1630cd848b3b82378900a2?cid=e1a970b4eb69499cb0dff383f57387b1'),
('WHAT TO DO?',250,1,'https://p.scdn.co/mp3-preview/46d9f66dde2b0d6f1b6bbeb3b8004de6d51795e9?cid=e1a970b4eb69499cb0dff383f57387b1');


--ALBUM TRAVIS SCOTT ASTRO WORLD
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES 
('CAROUSEL',180,2,'https://p.scdn.co/mp3-preview/1d0d1d66e1fff4aefd1e7a3cd2a79337af24a9e8?cid=e1a970b4eb69499cb0dff383f57387b1'),
('SICKO MODE',312,2,'https://p.scdn.co/mp3-preview/8229545ded5cacf393f62b17af653dfc8171fc85?cid=e1a970b4eb69499cb0dff383f57387b1'),
('WAKE UP',231,2,'https://p.scdn.co/mp3-preview/aba2af9b263620f0ffcc2b32b80489c73a9daa47?cid=e1a970b4eb69499cb0dff383f57387b1');


--ALBUM ORELSAN PERDU D'AVANCE
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES 
('Changement',197,3,'https://p.scdn.co/mp3-preview/43f956f096088d7900f382140ad1a4967b48cc98?cid=e1a970b4eb69499cb0dff383f57387b1'),
('Jimmy Punchline',246,3,'https://p.scdn.co/mp3-preview/517ac2bb307fe3a96fc27b142773d81d4689ebff?cid=e1a970b4eb69499cb0dff383f57387b1'),
('Courez Courez',243,3,'https://p.scdn.co/mp3-preview/4f0bec00ed0dcbf6556466f31db237b79f19cc6d?cid=e1a970b4eb69499cb0dff383f57387b1');


--ALBUM ORELSAN LE CHANT DES SIRENES
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES 
('Raelsan',255,4,'https://p.scdn.co/mp3-preview/1af5ed59ea57e2707e688752f27d14875de1dc6d?cid=e1a970b4eb69499cb0dff383f57387b1'),
('La terre est ronde',219,4,'https://p.scdn.co/mp3-preview/15cb3f002a5b5de7f6572bb6b1d845247b87e677?cid=e1a970b4eb69499cb0dff383f57387b1'),
('Ils sont cools',217,4,'https://p.scdn.co/mp3-preview/e74aafc0e95277adaafef4faef7981772fc0dcbb?cid=e1a970b4eb69499cb0dff383f57387b1');


--ALBUM CENTRAL CEE 23
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES 
('Khabib',201,5,'https://p.scdn.co/mp3-preview/35ff463a429bd6ae926c44a56da655e9e6b934a5?cid=e1a970b4eb69499cb0dff383f57387b1'),
('No Pain',94,5,'https://p.scdn.co/mp3-preview/559376925bd470f53ea3647b4bd66f976e90a860?cid=e1a970b4eb69499cb0dff383f57387b1'),
('Obsessed With You',108,5,'https://p.scdn.co/mp3-preview/58a9ab6ee7b59c7f07b8351ac87eff0a3c6a2f2f?cid=e1a970b4eb69499cb0dff383f57387b1');


INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,1), (1,2), (1,3), (1,4), (1,5), (1,6), (1,7), (1,8);

INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (2,9), (2,10), (2,11), (2,12), (2,13), (2,14);

INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (3,15),(3,16),(3,17);

ALTER SEQUENCE playlist_id_playlist_seq RESTART;
INSERT INTO playlist(nom_playlist, date_playlist, image_playlist, id_user)  VALUES('Banana"s playlist',CURRENT_DATE,'../image/banane.png',1);

INSERT INTO morceau_playlist(id_morceau, id_playlist) VALUES (1,1), (6,1), (10,1), (3,1), (7,1);
