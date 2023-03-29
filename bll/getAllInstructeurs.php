<?php
session_start();

if(!empty($_SESSION['login'])){

    require_once "../dal/class.data.instructeur.php";
    
    $instructeurs = new Instructeur();
    
    $instructeurs = $instructeurs->getAllInstructeurs();
    
    echo json_encode($instructeurs);

}

