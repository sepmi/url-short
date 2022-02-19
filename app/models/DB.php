<?php

namespace App\models;
use PDO;

 class  DB{
   protected $server = "localhost";
   protected $db = "url-shorten";
   protected $username = 'root';
   protected $password = '';
   protected $pdo = null;

    public function __construct()
    {

        try {
           $this->pdo = new PDO("mysql:host=$this->server;dbname=$this->db",$this->username,$this->password);
           $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e) {
            echo "connectio failed : " . $e->getMessage();
        }
    }

    public function hostName(){
        return $this->server;
    }


}