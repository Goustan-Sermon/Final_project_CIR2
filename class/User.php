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

    static function register() {


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
            } catch (PDOException $exception) {
                error_log('Connection error: '.$exception->getMessage());
                return false;
            }
           header('Location: index.php');
        }
        return false;
    }

    static function logout() {
        unset($_SESSION['id_user']);
        header('Location: index.php');
    }


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

    static function update_info($id, $prenom, $nom,$email)
        {
            $error=array();
            try{
                $dbh=Db::connexionBD();
                $statement = $dbh->prepare("SELECT email FROM public.utilisateur
                                                WHERE email=:email");
                $statement->bindParam(':email', $email);
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
            try
            {
                $dbh=Db::connexionBD();
                $request = 'UPDATE public.Utilisateur SET nom=:nom , prenom=:prenom,email=:email WHERE id_user=:id';
                $statement = $dbh->prepare($request);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->bindParam(':nom', $nom, PDO::PARAM_STR,50);
                $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
                $statement->bindParam(':email', $email, PDO::PARAM_STR, 80);
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
