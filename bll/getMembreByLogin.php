<?php
session_start();

if(!empty($_SESSION['login'])){

    require_once "../dal/class.data.membre.php";

    $membre = new Membre();

    $membre = $membre->getMembreByLogin($_SESSION['login']);

    //$membre['date_entree'] = date("d/m/Y", strtotime($membre['date_entree']));

    echo json_encode($membre);

}