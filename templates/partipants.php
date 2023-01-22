<?php
require '../vendor/autoload.php';
use App\Controllers\CandidatsControllers;
use App\Models\Candidats;
 if(isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone'])){
    $participants = new Candidats;
    $participants->NomParticipant =$_POST['last_name'];
    $participants->PrenomParticipant = $_POST['first_name'];
    $participants->PhoneParticipant = $_POST['phone'];
    $participants->EmailParticipant = $_POST['email'];
    try{
        (new CandidatsControllers)->AddNewCandidate($participants);
        header('Location: \views\confirmation.php');
    }catch (Exception $e) {
        echo 'Connection failed: ' .$e;
    }

 }