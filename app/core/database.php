<?php
Class Database{
    //This is Database class
    public static $conn;

    public function __construct(){

        try {

            $string = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME;
            self::$conn = new PDO($string,DB_USER,DB_PASS);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
    public static function getDbName(){
        return DB_NAME;
        }
    public static function getInstance(){

        if (self::$conn) {
           return self::$conn; 
        }
        return $instance = new self();
    }
    public static function newInstance(){
        return $instance = new self();
    }
    //read from database
    // public function read($query, $data = array()) {
    //     $statement = self::$conn->prepare($query);
    //     $result = $statement->execute($data);
    
    //     if ($result) {
    //         $data = $statement->fetchAll(PDO::FETCH_OBJ);
    //         if (is_array($data) && count($data) > 0) {
    //             return $data;
    //         }
    //     }
        
    //     return false;
    // }
    public function getError() {
        return $this->error; // Replace 'error' with the actual property or variable that stores the error message.
    }
    public function read($query, $data = array()) {
        $statement = self::$conn->prepare($query);
        $result = $statement->execute($data);
    
        if ($result) {
            $data = $statement->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data) && count($data) > 0) {
                return $data;
            }
        }
    
        return false;
    }
    
    //write from database
    public function write($query,$data = array()){

        $statement = self::$conn->prepare($query);
        $result = $statement->execute($data);

        if ($result) {
            
            return true;
        }
        return false;
    }

}

?>