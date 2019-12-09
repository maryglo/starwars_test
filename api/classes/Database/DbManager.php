<?php
namespace Starwars_Test\Database;

class DbManager {
    private static $instance = null;
    private $conn;

    private function __construct(){
        //Connecting to MongoDB
        try {
            $client = new \MongoDB\Client('mongodb://'._DB_SERVER_.':'._DB_PORT_);
            $this->conn = $client->{_DB_NAME_};
        }catch (\MongoConnectionException $e) {
            echo $e->getMessage();
            echo nl2br("n");
        }
    }

    /**
     * @return null|DbManager
     */
    public static function getInstance(){
        if(!self::$instance)
        {

            self::$instance = new \Starwars_Test\Database\DbManager();

        }

        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getConnection(){
        return $this->conn;
    }
}