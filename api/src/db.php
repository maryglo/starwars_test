<?php
namespace Starwars_Test\DbManager;

class DbManager {
    private static $instance = null;
    private $dbhost = 'candidate:PrototypeRocks123654@ds345028.mlab.com';
    private $dbport = '45028';
    private $endpoint = 'star-wars';
    private $conn;

    private function _construct(){
        //Connecting to MongoDB
        try {
            $this->conn = new MongoDBDriverManager('mongodb://'.$this->dbhost.':'.$this->dbport."/".$this->endpoint);
        }catch (MongoDBDriverExceptionException $e) {
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
            self::$instance = new DbManager();
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