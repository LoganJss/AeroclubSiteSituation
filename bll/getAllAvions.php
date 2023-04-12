<?php
session_start();

if(!empty($_SESSION['login'])){
    
    require_once "../dal/class.data.avion.php";
    
    $avions = new Avion();
    
    $avions = $avions->getAllAvions();
    
    echo json_encode($avions);
}