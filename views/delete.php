<?php
require '../vendor/autoload.php';
use App\Controllers\CandidatsControllers;
use App\Models\Candidats;
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $participants = new CandidatsControllers;
    $participants->DeleteCandidate($id);
   
    try{
        (new CandidatsControllers)->AddNewCandidate($participants);
    }catch (Exception $e) {
        echo 'Connection failed: ' .$e;
    }

 }