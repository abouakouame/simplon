<?php
namespace App\Config;
class DbConnection{
    public ?\PDO $database = null;
    public function getConnect(){
        if($this->database == null){
            try{
                $this->database = new \PDO('mysql:host=mysql-wassiou.alwaysdata.net;dbname=wassiou_simplon','wassiou','Wasscodeur228');
                // $this->database = new \PDO('mysql:host=localhost;dbname=candidats_simplon','root','');
                $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }catch (\PDOException $e) {
                echo 'Connection failed: ' .$e;
            }
        }
        return $this->database;
    }
}