<?php

require_once ('Database.php');

class Playlist
{

    static function get_playlist($id)
    {

        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT
    Playlist.id_playlist,
    Playlist.nom_playlist,
    Playlist.date_playlist,
    Playlist.image_playlist,
    Playlist.id_playlist

FROM
    Playlist
       
WHERE Playlist.id_user=:id
GROUP BY
    Playlist.id_playlist;");
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)) {
                return "false";
            } else {
                return $result;

            }
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }


    }

    public static function get_playlist_music($id)
    {
        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT p.id_playlist,p.nom_playlist,m.id_morceau, m.titre_morceau,ab.titre_album,ab.date_parution,p.image_playlist,m.duree, a.nom_artiste, ab.image_album
FROM Morceau m
         INNER JOIN Album ab ON m.id_album = ab.id_album
         INNER JOIN Artiste a ON ab.id_artiste = a.id_artiste
         INNER JOIN Morceau_Playlist mp ON m.id_morceau = mp.id_morceau
         INNER JOIN Playlist p ON mp.id_playlist = p.id_playlist
WHERE p.id_playlist = :idPlaylist;");
            $statement->bindParam(':idPlaylist', $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)) {
                return "false";
            } else {
                return $result;

            }
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }


    }

    static function add_music($id,$playlist)
    {
        try {

            $dbh=Db::connexionBD();
            $statement = $dbh->prepare("INSERT INTO morceau_playlist(id_morceau, id_playlist) 
                                                VALUES (:id_music,:id_playlist)");
            $statement->bindParam(":id_music", $id);
            $statement->bindParam(":id_playlist", $playlist);
            $statement->execute();

        } catch (PDOException $exception) {
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }
            return false;
}

    static function delete_music($music, $playlist)
    {

        try {
            $conn = Db::connexionBD();
            $statement = $conn->prepare('DELETE FROM morceau_playlist WHERE id_morceau=:id_music AND id_playlist=:id_playlist');
            $statement->bindParam(':id_music', $music);
            $statement->bindParam(':id_playlist', $playlist);
            $statement->execute();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return true;
    }

    static function create_playlist($id,$nom)
    {
        try {

            $dbh=Db::connexionBD();
            $statement = $dbh->prepare("INSERT INTO playlist(nom_playlist, date_playlist,image_playlist,id_user) 
                                                VALUES (:nom,CURRENT_DATE,'../image/banane.png',:id)");
            $statement->bindParam(":id", $id);
            $statement->bindParam(":nom", $nom);
            $statement->execute();

        } catch (PDOException $exception) {
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }
        return false;


    }


}