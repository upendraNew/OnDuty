<?php

    class User{
        private $dbh;
        public function __construct($dbh){
            $this->dbh = $dbh;
        }

        public function addUser($name, $email, $password, $phone, $address){
           try{
            $query = "INSERT INTO user (name, phone, email, password,address) VALUES (?,?,?,?,?)";

            $stmt = $this->dbh->prepare($query);
            $stmt->execute([$name, $phone, $email, $password, $address]);

            return true;
           }catch(PDOException $e){
               return false;
           }
        }

        public function login($email, $password){
            $query = "SELECT * FROM user WHERE email = ? AND password = ?";

            $stmt = $this->dbh->prepare($query);
            $stmt->execute([$email, $password]);
            return $stmt->rowCount();
        }
    }