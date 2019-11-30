<?php
class Db {
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
    private $dbname = 'onduty';
    
    private $dbh;

    public function __construct(){
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;
        $options = array (
					PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
                );
        
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
        }catch(PDOException $e){
            die($e->getMessage());
            return false;
        }

    }

    public function getDb(){
        return $this->dbh;
    }

    public function check($email){
        $stmt = $this->dbh->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        if($stmt->rowCount() != 0){
            $data = $stmt->fetchAll();
        }else{
            $stmt = $this->dbh->prepare("SELECT * FROM worker WHERE email = ?");
            $stmt->execute([$email]);
            $data = $stmt->fetchAll();
        }

        return $data;
    }
}