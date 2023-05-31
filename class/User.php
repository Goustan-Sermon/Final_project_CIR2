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
                $statement = $dbh->prepare('SELECT id_user, mdp FROM public.user WHERE email=:email');
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
                return "Mot de passe ou email incorrecte !";
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
                return 'Fille the last name field !';
            }
            if (empty($_POST['emailAddress'])) {
                return 'Fille the email address field !';
            }
            if (!filter_var($_POST['emailAddress'], FILTER_VALIDATE_EMAIL)) {
                return 'Email address is invalid !';
            }
            if (empty($_POST['Age'])) {
                return 'Age is invalid !';
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

                $statement = $dbh->prepare("SELECT email FROM public.User
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
                $statement = $dbh->prepare("INSERT INTO public.User(nom, prenom, email, mdp,age) 
                                                VALUES (:nom, :prenom, :email, :mdp,:age)");

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
            $statement = $dbh->prepare('SELECT * from public.User WHERE id_user=:id');
            $statement->bindParam(':id', $user_id);
            $statement->execute();
            return $statement->fetch();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
    }

}
