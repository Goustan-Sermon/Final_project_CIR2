<?php

require_once ('Database.php');
class Album
{

    function get_album(){

        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT Album.titre_album, Artiste.nom_artiste, Album.image_album, SUM(Morceau.duree) AS duree_totale
FROM Album
JOIN Artiste ON Album.id_artiste = Artiste.id_artiste
JOIN Morceau ON Album.id_album = Morceau.id_album
GROUP BY Album.id_album, Album.titre_album, Artiste.nom_artiste, Album.image_album");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }


}