<?php

namespace Spukm01069\Backend\libs;
use Spukm01069\Backend\config\Constants;
use PDO;
use PDOException;

class Database{
    private static $instance;
    private string $host;
    private string $db;
    private string $user;
    private string $password;
    private string $charset;
    private $pdo; 

    public function __construct(){
        $this->host = Constants::$HOST;
        $this->db = Constants::$DB;
        $this->user = Constants::$USER;
        $this->password = Constants::$PASSWORD;
        $this->charset = Constants::$CHARSET;
        
    }

    public static function getInstance(){
        if (self::$instance===null) {
            self::$instance=new Database();
        }
        return self::$instance;
    }

    public function connect(){
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;

            $options = [
                PDO::ATTR_PERSISTENT =>false,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                
                PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_EMULATE_PREPARES => true
            ];

            $this->pdo=new PDO(
                $connection,
                $this->user,
                $this->password,
                $options
            );

            return $this->pdo;
        
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }

    public function disconnect(){
        $this->pdo=null;
    }
}
