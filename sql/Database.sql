------------------------------------------------------------
--        Script Postgre
------------------------------------------------------------

DROP TABLE IF EXISTS public.User CASCADE;
DROP TABLE IF EXISTS public.Playlist CASCADE;
DROP TABLE IF EXISTS public.Types_Artistes CASCADE;
DROP TABLE IF EXISTS public.Artiste CASCADE;
DROP TABLE IF EXISTS public.Styles_Musicaux CASCADE;
DROP TABLE IF EXISTS public.Album CASCADE;
DROP TABLE IF EXISTS public.Morceau CASCADE;
DROP TABLE IF EXISTS public.Morceau_Playlist CASCADE;
DROP TABLE IF EXISTS public.Morceau_Artiste CASCADE;

------------------------------------------------------------
-- Table: User
------------------------------------------------------------

CREATE TABLE public.User(
                            id_user          SERIAL NOT NULL ,
                            nom              VARCHAR (50) NOT NULL ,
                            prenom           VARCHAR (50) NOT NULL ,
                            email            VARCHAR (150) NOT NULL ,
                            mdp              VARCHAR (256) NOT NULL ,
                            date_naissance   DATE  NOT NULL ,
                            photo_profile    VARCHAR (150)  ,
                            CONSTRAINT User_PK PRIMARY KEY (id_user)
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

    ,CONSTRAINT Playlist_User_FK FOREIGN KEY (id_user) REFERENCES public.User(id_user)
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
                             image_album     VARCHAR (150) NOT NULL ,
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



