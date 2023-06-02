<?php

class Artist
{
    function artist_filter($search){
        try {
            $dbh = Db::connexionBD();

            $statement = $dbh->prepare("SELECT nom_artiste, id_artiste
                                            FROM public.artiste
                                            WHERE nom_artiste ILIKE ':search%'");
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