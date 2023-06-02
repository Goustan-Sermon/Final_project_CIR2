<?php
require_once ('Database.php');
class Music
{

    function get_music(){

        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT
    Morceau.titre_morceau,
    Artiste.nom_artiste,
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
    function music_filter($search){
        try {
            $dbh = Db::connexionBD();

            $statement = $dbh->prepare("SELECT Morceau.titre_morceau, Artiste.nom_artiste, Morceau.duree, Album.image_album, Morceau.extrait
                                            FROM Morceau
                                            INNER JOIN Morceau_Artiste ON Morceau.id_morceau = Morceau_Artiste.id_morceau
                                            INNER JOIN Artiste ON Morceau_Artiste.id_artiste = Artiste.id_artiste
                                            INNER JOIN Album ON Morceau.id_album = Album.id_album   
                                            WHERE Morceau.titre_morceau
                                            ILIKE '%:search%';");
            $statement->bindParam(':search', $search);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }
        return $result;
    }

}