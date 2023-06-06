<?php

session_start();

require_once('Database.php');

class User
{


    static function Login()
    {


        $fileName = explode('/', $_SERVER['PHP_SELF']);
        $fileName = end($fileName);
        if (isset($_SESSION['id_user'])){
            if ($fileName == 'index.php') {
                header('Location: ../User/user_home.php');
            }
            return $_SESSION['id_user'];
        }

        if (!isset($_SESSION['id_user']) && $fileName != 'index.php') {    //deco
            header('Location: ../User/index.php');
        }

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            try {
                $dbh = Db::connexionBD();
                $statement = $dbh->prepare('SELECT id_user, mdp FROM public.Utilisateur WHERE email=:email');
                $statement->bindParam(':email', $_POST['email']);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);


            } catch (PDOException $exception) {
                error_log('Connection error: '.$exception->getMessage());
                return false;
            }

            if (!empty($result) && password_verify($_POST['password'], $result['mdp'])) {
                $_SESSION['id_user'] = $result['id_user'];
                header('Location: ../User/user_home.php');
            }
            else{
                return "Password or email incorrect !";
            }
            return $_SESSION['id_user'];
        }
        return false;
    }

    /* creation du compte*/
    static function register() {

        // Verifie si tout les champs sont pas vides et qu'il n'y a aucun probleme
        if (!empty($_POST)) {
            if(empty($_POST['firstName'])) {
                return 'Fill the first name field !';
            }
            if (empty($_POST['lastName'])) {
                return 'Fill the last name field !';
            }
            if (empty($_POST['emailAddress'])) {
                return 'Fill the email address field !';
            }
            if (!filter_var($_POST['emailAddress'], FILTER_VALIDATE_EMAIL)) {
                return 'Email address is invalid !';
            }
            if (empty($_POST['Age'])) {

                return 'Age is invalid !';
            }else{
                $res= new DateTime();
                $day= new DateTime();
                $a=explode('-',$_POST['Age']);
                $res->setDate($a[0],$a[1],$a[2]);
                if ($day<$res)
                    return 'incorrect date';
            }

            if (empty($_POST['password'])) {
                return 'Fill the password field !';
            }
            if (empty($_POST['confirm'])) {
                return 'Fill the confirm password field !';
            }
            if ($_POST['password'] != $_POST['confirm']) {
                return 'Passwords do not fit !';
            }

            // Verifie si l'eamil existe deja
            try {
                $dbh = Db::connexionBD();

                $statement = $dbh->prepare("SELECT email FROM public.Utilisateur
                                                WHERE email=:email");
                $statement->bindParam(':email', $_POST['emailAddress']);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $exception) {
                error_log('Connection error: '.$exception->getMessage());
                return false;
            }

            if (!empty($result)) {
                return 'The email address already exist !';
            }

            // si tout es ok alors on creer le nouveau user
            try {
                $statement = $dbh->prepare("INSERT INTO public.Utilisateur(nom, prenom, email, mdp,date_naissance,photo_profile) 
                                                VALUES (:nom, :prenom, :email, :mdp,:age,'../image/default_profil.png')");


                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $statement->bindParam(":nom", $_POST['lastName']);
                $statement->bindParam(":prenom", $_POST['firstName']);
                $statement->bindParam(":email", $_POST['emailAddress']);
                $statement->bindParam(":mdp", $password);
                $statement->bindParam(":age", $_POST['Age']);
                $statement->execute();
                $idUtilisateur=$dbh->lastInsertId();

                // on leur creer 2 playlist par defaut associer à leur id (favoris et les 10 dernieres ecoutes)
                $statement=$dbh->prepare("INSERT INTO public.Playlist (nom_playlist, date_playlist, image_playlist, id_user) 
                                VALUES ('Liked Titles', CURRENT_DATE, '../image/favoris.jpg', :idUtilisateur)");
                $statement->bindParam(":idUtilisateur", $idUtilisateur);
                $statement->execute();

                $statement=$dbh->prepare("INSERT INTO public.Playlist (nom_playlist, date_playlist, image_playlist, id_user) 
                                VALUES ('The last 10 listens', CURRENT_DATE, '../image/history.jpg', :idUtilisateur)");
                $statement->bindParam(":idUtilisateur", $idUtilisateur);
                $statement->execute();

            } catch (PDOException $exception) {
                error_log('Connection error: '.$exception->getMessage());
                return false;
            }
           header('Location: index.php');
        }
        return false;



    }

    /* pour se ddeconnecter*/
    static function logout() {
        unset($_SESSION['id_user']);
        header('Location: index.php');
    }

    /* recupere toute les infos d'un user */
    static function get_info_client($user_id)
    {
        try {
            $dbh = Db::connexionBD();
            $statement = $dbh->prepare('SELECT id_user,nom,prenom,email,date_naissance,photo_profile,EXTRACT(YEAR FROM AGE(CURRENT_DATE,date_naissance))as age from public.Utilisateur WHERE id_user=:id');
            $statement->bindParam(':id', $user_id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

    static function get_id($id){
        try {
            $conn = Db::connexionBD();
            $statement = $conn->prepare("SELECT id_playlist FROM playlist WHERE id_user=:id_user and nom_playlist='The last 10 listens';");
            $statement->bindParam(':id_user', $id);
            $statement->execute();
            $result= $statement->fetch(PDO::FETCH_ASSOC);
            $id_playlist=$result['id_playlist'];
            return $id_playlist;
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
    }
    /*
     * Update les infos du user
     */
    static function update_info($id, $prenom, $nom,$email,$date)
        {
            $error=array();


            /* on verifie si chaque champ et rempli et ne comporte pas de problème*/
            if (!empty($_POST)) {
                if (empty($_POST['firstName'])) {
                    array_push($error, 'Fill the first name field !');
                    return $error;
                }
                if (empty($_POST['lastName'])) {
                    array_push($error,  'Fill the last name field !');
                    return $error;

                }
                if (empty($_POST['emailAddress'])) {
                    array_push($error,  'Fill the email address field !');
                    return $error;

                }
                if (!filter_var($_POST['emailAddress'], FILTER_VALIDATE_EMAIL)) {
                    array_push($error, 'The email is incorrect');
                    return $error;

                }
                if (empty($_POST['Age'])) {

                    array_push($error, 'Age is invalid !');
                    return $error;

                }else{
                    $res= new DateTime();
                    $day= new DateTime();
                    $a=explode('-',$_POST['Age']);
                    $res->setDate($a[0],$a[1],$a[2]);
                    if ($day<$res)
                       array_push($error,'incorrect date');
                    return $error;
                }

            }

            /* ON verifie si le mail n'existe pas deja*/
            try{
                $dbh=Db::connexionBD();
                $statement = $dbh->prepare("SELECT email FROM public.utilisateur
                                                WHERE email=:email AND id_user!=:id");
                $statement->bindParam(':email', $email);
                $statement->bindParam(':id', $id);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $exception) {
                error_log('Connection error: '.$exception->getMessage());
                return false;
            }

            if (!empty($result)) {
                array_push($error,'The email already exist');
                return $error;
            }

            // si tout est ok on fait les changements
            try
            {
                $dbh=Db::connexionBD();
                $request = 'UPDATE public.Utilisateur SET nom=:nom , prenom=:prenom,email=:email,date_naissance=:birth WHERE id_user=:id';
                $statement = $dbh->prepare($request);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->bindParam(':nom', $nom, PDO::PARAM_STR,50);
                $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
                $statement->bindParam(':email', $email, PDO::PARAM_STR, 80);
                $statement->bindParam(':birth', $date, PDO::PARAM_STR, 80);
                $statement->execute();
            }
            catch (PDOException $exception)
            {
                error_log('Request error: '.$exception->getMessage());
                return false;
            }
            return True;
        }

}

function print_array($tab){
    print('<pre>'.print_r($tab,true).'</pre>');
}
