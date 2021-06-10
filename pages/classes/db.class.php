<?php
class db{
    private $conn;
    private $host;
    private $user;
    private $password;
    private $dbName;
    private $debug;

    public function __construct($params=array()){
        $this->conn = false;
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = 'root';
        $this->dbName = 'project07';
        $this->debug = true;
        $this->connect();
    }

    public function __destruct(){
        $this->disconnect();
    }

    public function connect(){
        if(!$this->conn){
            try{
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName.'', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); 
            }catch(Exception $e){
                echo $e->getMessage();            
            }
            if(!$this->conn){
                $this->status_fatal = true;
                echo 'Connection failed';
                die();
            }else{
                $this->status_fatal = false;
            } 
        }
        return $this->conn;
    }

    public function disconnect(){
        if($this->conn){
            $this->conn = null;
        }
    }

    public function getOne($query){
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        if(!$stmt){
            echo 'PDO::errorInfo():';
            echo '<br>';
            echo 'error SQL: '.$query;
            die();
        }
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetch();

        return $response;
    }

    public function getAll($query, $params=array()){
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        if(!$stmt){
            echo 'PDO::errorInfo():';
            echo '<br>';
            echo 'error SQL: '.$query;
            die();
        }
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $response;
    }

    public function get($query){
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        if(!$stmt){
            echo 'PDO::errorInfo():';
            echo '<br>';
            echo 'error SQL: '.$query;
            die();
        }
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $response;
    }

    public function execute($query, $params = array())
    {
        $stmt = self::connect()->prepare($query);
        $stmt->execute($params);
        if(!$stmt){
            echo 'PDO::errorInfo():';
            echo '<br>';
            echo 'error SQL: '.$query;
            die();
        }
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>