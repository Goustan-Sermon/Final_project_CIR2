<?php
// Enable all warnings and errors.
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

include_once('config.php');


class Db
{
    static $db = null;
    static function connexionBD() {
        if (self::$db != null) {
            return self::$db;
        }

        try {
            $db = new PDO('pgsql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);

        }
        catch (PDOException $exception) {
            //die('Connection error: '.$exception->getMessage());
            error_log('Connection error: '.$exception->getMessage());
            return false;
        }
        self::$db = $db;
        return $db;
    }
}

// $dbh = Db::connexionBD();
// $statement = $dbh->query('SELECT * FROM public.user');
// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($result);