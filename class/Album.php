<?php

require_once ('Database.php');
class Album
{

    static function get_music_by_album($id_playlist){
        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT m.id_morceau,m.titre_morceau, m.duree, a.nom_artiste, s.style, al.titre_album, al.image_album,al.date_parution,m.extrait
FROM Morceau m
JOIN Album al ON m.id_album = al.id_album
JOIN Artiste a ON al.id_artiste = a.id_artiste
JOIN Styles_Musicaux s ON al.id_style = s.id_style
WHERE al.id_album = :id_album;
");
            $statement->bindParam(':id_album', $id_playlist);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }
    static function get_album(){

        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT artiste.id_artiste, Album.id_album,Album.titre_album, Artiste.nom_artiste, Album.image_album, SUM(Morceau.duree) AS duree_totale
FROM Album
JOIN Artiste ON Album.id_artiste = Artiste.id_artiste
JOIN Morceau ON Album.id_album = Morceau.id_album
GROUP BY Album.id_album, Album.titre_album, Artiste.nom_artiste,artiste.id_artiste, Album.image_album");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }
    static function album_filter($search){
        try {
            $dbh = Db::connexionBD();

            $statement = $dbh->prepare("SELECT a.titre_album, a.date_parution, a.image_album, a.id_album, ar.nom_artiste
                                            FROM public.album a
                                            JOIN public.artiste ar ON a.id_artiste = ar.id_artiste
                                            WHERE titre_album ILIKE :search || '%'");
            $statement->bindParam(':search', $search);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){

                return "false";
            }
        } catch (PDOException $exception) {
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }
        return $result;
    }
    static function date_filter($search){
        try {
            $dbh = Db::connexionBD();

            $statement = $dbh->prepare("SELECT a.titre_album, a.date_parution, a.image_album, a.id_album, ar.nom_artiste
                                            FROM public.album a
                                            JOIN public.artiste ar ON a.id_artiste = ar.id_artiste
                                            WHERE EXTRACT(YEAR FROM a.date_parution) = :search;");
            $statement->bindParam(':search', $search);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){

                return "false";
            }
        } catch (PDOException $exception) {
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }
        return $result;
    }
}