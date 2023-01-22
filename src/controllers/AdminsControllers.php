<?php
namespace App\Controllers;

use App\Config\DbConnection;
use App\Models\Admins;
class AdminsControllers{
    public DbConnection $connection;
    public function __construct(){
        $this->connection = new DbConnection;
    }
    //login
    public function Login(Admins $admin){
      // verifier si mail le mot de passe sont corect
        $sql = "SELECT * FROM admins WHERE AdminEmail = :AdminEmail AND AdminPassword = :AdminPassword";
        $stmt = $this->connection->getConnect()->prepare($sql);  
        $stmt->bindParam(':AdminEmail', $admin->AdminEmail);
        $stmt->bindParam(':AdminPassword', $admin->AdminPassword);
        $stmt->execute();
        $result = $stmt->fetch();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function Signup(Admins $admin){
      //verifier si le mail existe deja
        $sql = "SELECT * FROM admins WHERE AdminEmail = :AdminEmail";
        $stmt = $this->connection->getConnect()->prepare($sql);  
        $stmt->bindParam(':AdminEmail', $admin->AdminEmail);
        $stmt->execute();
        $result = $stmt->fetch();
        if($result){
            return false;
        }else{
            $sql = "INSERT INTO admins (AdminName, AdminEmail, AdminPassword) VALUES (:AdminName, :AdminEmail, :AdminPassword)";
            $stmt = $this->connection->getConnect()->prepare($sql);
            $stmt->bindParam(':AdminName', $admin->AdminName);
            $stmt->bindParam(':AdminEmail', $admin->AdminEmail);
            $stmt->bindParam(':AdminPassword', $admin->AdminPassword);
            $stmt->execute();
            return true;
        }
    }
}