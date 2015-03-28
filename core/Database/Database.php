<?php namespace Core\Database;
use PDO;

/**
 * Created by PhpStorm.
 * User: Dinuka.T
 * Date: 14-Mar-15
 * Time: 10:59 AM
 */
class Database {
    private  static $conn = null;

    public static function open(){
        require_once(__DIR__.'/../../app/config/database.php');
        if(!self::$conn){
            try {
                $host = HOST;
                $dbname = DBNAME;
                $conn = new PDO("mysql:host={$host};dbname={$dbname}",DB_USERNAME,DB_PASSWORD );
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self ::$conn = $conn;
                //echo"okay";
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

    public static function close(){
        self::$conn = null;
    }

    public static function getConnection(){
        return self::$conn;
    }
}

