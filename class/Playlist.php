<?php

require_once ('Database.php');

class Playlist
{



    static function get_playlist($id){

        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare("SELECT
    Playlist.nom_playlist,
    Playlist.date_playlist,
    Playlist.image_playlist,
    Playlist.id_playlist,
    STRING_AGG(DISTINCT Artiste.nom_artiste, ', ') AS artistes,
    SUM(Morceau.duree) AS duree_totale
FROM
    Playlist
        INNER JOIN Morceau_Playlist ON Playlist.id_playlist = Morceau_Playlist.id_playlist
        INNER JOIN Morceau ON Morceau_Playlist.id_morceau = Morceau.id_morceau
        INNER JOIN Morceau_Artiste ON Morceau.id_morceau = Morceau_Artiste.id_morceau
        INNER JOIN Artiste ON Morceau_Artiste.id_artiste = Artiste.id_artiste
WHERE Playlist.id_user=:id
GROUP BY
    Playlist.id_playlist;");
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)){
                return [];
            }else{
                return $result;

            }
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }

    function playlist_filter($search){
        try {
            $dbh = Db::connexionBD();

            $statement = $dbh->prepare("SELECT p.nom_playlist, p.date_playlist, p.image_playlist, u.nom, u.prenom
                                                FROM public.Playlist p
                                                JOIN public.Utilisateur u ON p.id_user = u.id_user
                                                WHERE nom_playlist ILIKE ':search%'");
            $statement->bindParam(':search', $search);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }
        return $result;
    }

}}