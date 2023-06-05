<?php
require_once ('Database.php');
class Music
{

     static function get_music_by_id($id)
    {
        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT m.titre_morceau AS music_title, a.nom_artiste AS artist_name, m.duree, ab.image_album AS album_photo, m.extrait
FROM Morceau m
JOIN Album ab ON m.id_album = ab.id_album
JOIN Artiste a ON ab.id_artiste = a.id_artiste
WHERE m.id_morceau =:id_music;");
            $statement->bindParam(':id_music', $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

    function get_music(){

        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT
    Morceau.id_morceau,   
    Morceau.titre_morceau,
    Artiste.nom_artiste,
    Artiste.id_artiste,
    Morceau.duree,
    Album.image_album
FROM
    Morceau
        INNER JOIN Morceau_Artiste ON Morceau.id_morceau = Morceau_Artiste.id_morceau
        INNER JOIN Artiste ON Morceau_Artiste.id_artiste = Artiste.id_artiste
        INNER JOIN Album ON Morceau.id_album = Album.id_album
ORDER BY random();");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }
    static function music_filter($search){
        try {
            $dbh = Db::connexionBD();

            $statement = $dbh->prepare("SELECT Morceau.titre_morceau, Artiste.nom_artiste, Morceau.duree, Album.image_album, Morceau.extrait, Morceau.id_morceau
                                            FROM Morceau
                                            INNER JOIN Morceau_Artiste ON Morceau.id_morceau = Morceau_Artiste.id_morceau
                                            INNER JOIN Artiste ON Morceau_Artiste.id_artiste = Artiste.id_artiste
                                            INNER JOIN Album ON Morceau.id_album = Album.id_album   
                                            WHERE Morceau.titre_morceau
                                            ILIKE  :search || '%';");
            $statement->bindParam(':search', $search);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }
        return $result;
    }

}