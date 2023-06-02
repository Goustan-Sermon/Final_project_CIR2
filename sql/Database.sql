------------------------------------------------------------
--        Script Postgre
------------------------------------------------------------
DROP TABLE IF EXISTS public.user CASCADE ;
DROP TABLE IF EXISTS public.Utilisateur CASCADE;
DROP TABLE IF EXISTS public.Playlist CASCADE;
DROP TABLE IF EXISTS public.Types_Artistes CASCADE;
DROP TABLE IF EXISTS public.Artiste CASCADE;
DROP TABLE IF EXISTS public.Styles_Musicaux CASCADE;
DROP TABLE IF EXISTS public.Album CASCADE;
DROP TABLE IF EXISTS public.Morceau CASCADE;
DROP TABLE IF EXISTS public.Morceau_Playlist CASCADE;
DROP TABLE IF EXISTS public.Morceau_Artiste CASCADE;

------------------------------------------------------------
-- Table: Utilisateur
------------------------------------------------------------
CREATE TABLE public.Utilisateur(
                                   id_user          SERIAL NOT NULL ,
                                   nom              VARCHAR (50) NOT NULL ,
                                   prenom           VARCHAR (50) NOT NULL ,
                                   email            VARCHAR (150) NOT NULL ,
                                   mdp              VARCHAR (256) NOT NULL ,
                                   date_naissance   DATE  NOT NULL ,
                                   photo_profile    VARCHAR (150)   ,
                                   CONSTRAINT Utilisateur_PK PRIMARY KEY (id_user)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Playlist
------------------------------------------------------------
CREATE TABLE public.Playlist(
                                id_playlist      SERIAL NOT NULL ,
                                nom_playlist     VARCHAR (50) NOT NULL ,
                                date_playlist    DATE  NOT NULL ,
                                image_playlist   VARCHAR (150) NOT NULL ,
                                id_user          INT  NOT NULL  ,
                                CONSTRAINT Playlist_PK PRIMARY KEY (id_playlist)

    ,CONSTRAINT Playlist_Utilisateur_FK FOREIGN KEY (id_user) REFERENCES public.Utilisateur(id_user)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Types_Artistes
------------------------------------------------------------
CREATE TABLE public.Types_Artistes(
                                      id_type        SERIAL NOT NULL ,
                                      type_artiste   VARCHAR (50) NOT NULL  ,
                                      CONSTRAINT Types_Artistes_PK PRIMARY KEY (id_type)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Artiste
------------------------------------------------------------
CREATE TABLE public.Artiste(
                               id_artiste    SERIAL NOT NULL ,
                               nom_artiste   VARCHAR (50) NOT NULL ,
                               id_type       INT  NOT NULL  ,
                               CONSTRAINT Artiste_PK PRIMARY KEY (id_artiste)

    ,CONSTRAINT Artiste_Types_Artistes_FK FOREIGN KEY (id_type) REFERENCES public.Types_Artistes(id_type)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Styles_Musicaux
------------------------------------------------------------
CREATE TABLE public.Styles_Musicaux(
                                       id_style   SERIAL NOT NULL ,
                                       style      VARCHAR (50) NOT NULL  ,
                                       CONSTRAINT Styles_Musicaux_PK PRIMARY KEY (id_style)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Album
------------------------------------------------------------
CREATE TABLE public.Album(
                             id_album        SERIAL NOT NULL ,
                             titre_album     VARCHAR (50) NOT NULL ,
                             date_parution   DATE  NOT NULL ,
                             image_album     VARCHAR (150) ,
                             id_artiste      INT  NOT NULL ,
                             id_style        INT  NOT NULL  ,
                             CONSTRAINT Album_PK PRIMARY KEY (id_album)

    ,CONSTRAINT Album_Artiste_FK FOREIGN KEY (id_artiste) REFERENCES public.Artiste(id_artiste)
    ,CONSTRAINT Album_Styles_Musicaux0_FK FOREIGN KEY (id_style) REFERENCES public.Styles_Musicaux(id_style)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Morceau
------------------------------------------------------------
CREATE TABLE public.Morceau(
                               id_morceau      SERIAL NOT NULL ,
                               titre_morceau   VARCHAR (50) NOT NULL ,
                               duree           INT  NOT NULL ,
                               id_album        INT  NOT NULL  ,
                               extrait         VARCHAR (150) NOT NULL ,
                               CONSTRAINT Morceau_PK PRIMARY KEY (id_morceau)

    ,CONSTRAINT Morceau_Album_FK FOREIGN KEY (id_album) REFERENCES public.Album(id_album)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Morceau_Playlist
------------------------------------------------------------
CREATE TABLE public.Morceau_Playlist(
                                        id_morceau    INT  NOT NULL ,
                                        id_playlist   INT  NOT NULL  ,
                                        CONSTRAINT Morceau_Playlist_PK PRIMARY KEY (id_morceau,id_playlist)

    ,CONSTRAINT Morceau_Playlist_Morceau_FK FOREIGN KEY (id_morceau) REFERENCES public.Morceau(id_morceau)
    ,CONSTRAINT Morceau_Playlist_Playlist0_FK FOREIGN KEY (id_playlist) REFERENCES public.Playlist(id_playlist)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Morceau_Artiste
------------------------------------------------------------
CREATE TABLE public.Morceau_Artiste(
                                       id_artiste   INT  NOT NULL ,
                                       id_morceau   INT  NOT NULL  ,
                                       CONSTRAINT Morceau_Artiste_PK PRIMARY KEY (id_artiste,id_morceau)

    ,CONSTRAINT Morceau_Artiste_Artiste_FK FOREIGN KEY (id_artiste) REFERENCES public.Artiste(id_artiste)
    ,CONSTRAINT Morceau_Artiste_Morceau0_FK FOREIGN KEY (id_morceau) REFERENCES public.Morceau(id_morceau)
)WITHOUT OIDS;

INSERT INTO styles_musicaux(style) VALUES ('Drill');
INSERT INTO styles_musicaux(style) VALUES ('Rap');
INSERT INTO styles_musicaux(style) VALUES ('Pop');
INSERT INTO styles_musicaux(style) VALUES ('Classique');
INSERT INTO styles_musicaux(style) VALUES ('Hip-Hop');
INSERT INTO styles_musicaux(style) VALUES ('Variétés Française');

INSERT INTO types_artistes(type_artiste) VALUES ('Chanteur');
INSERT INTO types_artistes(type_artiste) VALUES ('DJ');
INSERT INTO types_artistes(type_artiste) VALUES ('Groupe');

INSERT INTO artiste(nom_artiste, id_type) VALUES ('Travis Scott',1);
INSERT INTO Album(titre_album, date_parution, image_album, id_artiste, id_style) VALUES ('JACK BOYS','2019-12-27','https://i.scdn.co/image/ab67616d0000b273dfc2f59568272de50a257f2f',1,1);
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('HIGHEST IN THE ROOM',244,1,'https://p.scdn.co/mp3-preview/2d4113dd008f19cd24e08c2e34ee9be93d90375e?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('GANG GANG',244,1,'https://p.scdn.co/mp3-preview/141c6ad419a080ca81a44bac636e8b4bedb9ac94?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('HAD ENOUGH',157,1,'https://p.scdn.co/mp3-preview/4482742c2c6cc7968066d7476d8a4ff448b222b4?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('OUT WEST',157,1,'https://p.scdn.co/mp3-preview/63aafaebdbc7655a5c1630cd848b3b82378900a2?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('WHAT TO DO?',250,1,'https://p.scdn.co/mp3-preview/46d9f66dde2b0d6f1b6bbeb3b8004de6d51795e9?cid=e1a970b4eb69499cb0dff383f57387b1');


INSERT INTO Album(titre_album, date_parution, image_album, id_artiste, id_style) VALUES ('ASTRO WORLD','2018-08-03','https://i.scdn.co/image/ab67616d0000b273072e9faef2ef7b6db63834a3',1,1);
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('CAROUSEL',180,2,'https://p.scdn.co/mp3-preview/1d0d1d66e1fff4aefd1e7a3cd2a79337af24a9e8?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('SICKO MODE',312,2,'https://p.scdn.co/mp3-preview/8229545ded5cacf393f62b17af653dfc8171fc85?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('WAKE UP',231,2,'https://p.scdn.co/mp3-preview/aba2af9b263620f0ffcc2b32b80489c73a9daa47?cid=e1a970b4eb69499cb0dff383f57387b1');


INSERT INTO artiste(nom_artiste, id_type) VALUES ('Orelsan',1);
INSERT INTO Album(titre_album, date_parution, image_album, id_artiste, id_style) VALUES ('Perdu d"Avance','2009-02-16','https://i.scdn.co/image/ab67616d0000b2730b2e3999b189fa2a8a6a752f',2,2);
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('Changement',197,3,'https://p.scdn.co/mp3-preview/43f956f096088d7900f382140ad1a4967b48cc98?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('Jimmy Punchline',246,3,'https://p.scdn.co/mp3-preview/517ac2bb307fe3a96fc27b142773d81d4689ebff?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('Courez Courez',243,3,'https://p.scdn.co/mp3-preview/4f0bec00ed0dcbf6556466f31db237b79f19cc6d?cid=e1a970b4eb69499cb0dff383f57387b1');


INSERT INTO Album(titre_album, date_parution, image_album, id_artiste, id_style) VALUES ('Le chant des sirènes','2011-09-26','https://i.scdn.co/image/ab67616d0000b27342a91184c215f8a95b5f77ec',2,2);
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('Raelsan',255,4,'https://p.scdn.co/mp3-preview/1af5ed59ea57e2707e688752f27d14875de1dc6d?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('La terre est ronde',219,4,'https://p.scdn.co/mp3-preview/15cb3f002a5b5de7f6572bb6b1d845247b87e677?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('Ils sont cools',217,4,'https://p.scdn.co/mp3-preview/e74aafc0e95277adaafef4faef7981772fc0dcbb?cid=e1a970b4eb69499cb0dff383f57387b1');

INSERT INTO artiste(nom_artiste, id_type) VALUES ('Central Cee',1);
INSERT INTO Album(titre_album, date_parution, image_album, id_artiste, id_style) VALUES ('23','2022-02-25','https://i.scdn.co/image/ab67616d0000b273e1f05c994777b79bc5c87547',3,1);
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('Khabib',201,5,'https://p.scdn.co/mp3-preview/35ff463a429bd6ae926c44a56da655e9e6b934a5?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('No Pain',94,5,'https://p.scdn.co/mp3-preview/559376925bd470f53ea3647b4bd66f976e90a860?cid=e1a970b4eb69499cb0dff383f57387b1');
INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ('Obsessed With You',108,5,'https://p.scdn.co/mp3-preview/58a9ab6ee7b59c7f07b8351ac87eff0a3c6a2f2f?cid=e1a970b4eb69499cb0dff383f57387b1');


INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,1);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,2);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,3);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,4);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,5);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,6);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,7);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (1,8);

INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (2,9);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (2,10);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (2,11);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (2,12);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (2,13);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (2,14);

INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (3,15);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (3,16);
INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES (3,17);

INSERT INTO playlist(nom_playlist, date_playlist, image_playlist, id_user)  VALUES('Banana"s playlist',CURRENT_DATE,'../image/banane.png',1);
INSERT INTO morceau_playlist(id_morceau, id_playlist) VALUES (1,1);
INSERT INTO morceau_playlist(id_morceau, id_playlist) VALUES (6,1);
INSERT INTO morceau_playlist(id_morceau, id_playlist) VALUES (10,1);
INSERT INTO morceau_playlist(id_morceau, id_playlist) VALUES (3,1);
INSERT INTO morceau_playlist(id_morceau, id_playlist) VALUES (7,1);


SELECT Album.titre_album, Artiste.nom_artiste, Album.image_album, SUM(Morceau.duree) AS duree_totale
FROM Album
         JOIN Artiste ON Album.id_artiste = Artiste.id_artiste
         JOIN Morceau ON Album.id_album = Morceau.id_album
GROUP BY Album.id_album, Album.titre_album, Artiste.nom_artiste, Album.image_album;




