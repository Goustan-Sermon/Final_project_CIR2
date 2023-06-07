<?php

class Artist
{

    // Recher les artiste en fonction d'une recherche
    static function artist_filter($search){

        try {
            $dbh = Db::connexionBD();

            $statement = $dbh->prepare("SELECT nom_artiste, id_artiste,image_artiste
                                            FROM public.artiste
                                            WHERE nom_artiste ILIKE  :search || '%'");
            $statement->bindParam(':search', $search);
            $statement->execute();
            $result= $statement->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                return "false";

            }else{
                return $result;}

        } catch (PDOException $exception) {
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }

    }

    // Recherche tout les albums d'un artiste
    static function get_album_by_artist($id_artiste){
        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT Album.*, Artiste.nom_artiste, Artiste.image_artiste, Types_Artistes.type_artiste
FROM Artiste
INNER JOIN Album ON Artiste.id_artiste = Album.id_artiste
INNER JOIN Types_Artistes ON Artiste.id_type = Types_Artistes.id_type
WHERE Artiste.id_artiste = :id_artiste;");
            $statement->bindParam(':id_artiste', $id_artiste);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

}