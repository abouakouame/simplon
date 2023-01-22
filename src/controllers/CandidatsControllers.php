<?php
namespace App\Controllers;

use App\Config\DbConnection;
use App\Models\Candidats;
class CandidatsControllers{
    public DbConnection $connection;
    public function __construct(){
        $this->connection = new DbConnection;
    }
    public function getAllCandidats(){
        $sql = "SELECT * FROM participants";
        $stmt = $this->connection->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getAllCandidatById(int $id){
        $sql = "SELECT * FROM participants WHERE id = :id";
        $stmt = $this->connection->getConnect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function AddNewCandidate(Candidats $candidat){
        try{
            $sql = "INSERT INTO participants (NomParticipant, PrenomParticipant, PhoneParticipant, EmailParticipant, ApplyAt, UpdateAt) VALUES (:NomParticipant, :PrenomParticipant, :PhoneParticipant, :EmailParticipant, now(), now())";
            $stmt = $this->connection->getConnect()->prepare($sql);
            $stmt->bindParam(':NomParticipant', $candidat->NomParticipant);
            $stmt->bindParam(':PrenomParticipant', $candidat->PrenomParticipant);
            $stmt->bindParam(':PhoneParticipant', $candidat->PhoneParticipant);
            $stmt->bindParam(':EmailParticipant', $candidat->EmailParticipant);
            $stmt->execute();
        }catch (Exception $e) {
            echo 'Connection failed: ' .$e;
        }
    }
    public function DeleteCandidate($id){
       try{
        $sql = "DELETE FROM participants WHERE id = :id";
        $stmt = $this->connection->getConnect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: \views\participants.php');
    }catch (Exception $e) {
        echo 'Connection failed: ' .$e;
    }
    }
  //update
  public function UpdateCandidate(Candidats $candidat){
    try{
        $sql = "UPDATE participants SET NomParticipant = :NomParticipant, PrenomParticipant = :PrenomParticipant, PhoneParticipant = :PhoneParticipant, EmailParticipant = :EmailParticipant, UpdateAt = now() WHERE id = :id";
        $stmt = $this->connection->getConnect()->prepare($sql);
        $stmt->bindParam(':NomParticipant', $candidat->NomParticipant);
        $stmt->bindParam(':PrenomParticipant', $candidat->PrenomParticipant);
        $stmt->bindParam(':PhoneParticipant', $candidat->PhoneParticipant);
        $stmt->bindParam(':EmailParticipant', $candidat->EmailParticipant);
        $stmt->bindParam(':id', $candidat->id);
        $stmt->execute();
    }catch (Exception $e) {
        echo 'Connection failed: ' .$e;
    }
    }
}