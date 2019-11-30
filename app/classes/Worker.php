<?php 

    class Worker{
        private $dbh;

        public function __construct($dbh){
            $this->dbh = $dbh;
        }

        public function addWorker($name, $email, $address, $mobile, $password, $status, $experience, $education, $work, $salary){
            try{
                $query = "INSERT INTO worker (name, email, address, mobile, password, status, experience, education, work, wage) VALUES (?,?,?,?,?,?,?,?,?,?)";
    
                $stmt = $this->dbh->prepare($query);
                $stmt->execute([$name, $email, $address, $mobile, $password, $status, $experience, $education, $work, $salary]);
                return true;
               }catch(PDOException $e){
                  die($e->getMessage());
               }
        }

        public function login($email, $password){
            $query = "SELECT * FROM worker WHERE email = ? AND password = ?";

            $stmt = $this->dbh->prepare($query);
            $stmt->execute([$email, $password]);
            return $stmt->rowCount();
        }

        public function byWork($work){
            $query = "SELECT * FROM worker WHERE work = ?";

            $stmt = $this->dbh->prepare($query);
            $stmt->execute([$work]);

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }