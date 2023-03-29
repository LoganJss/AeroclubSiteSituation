<?php
include '../dal/class.data.avion.php';
      
echo '<h2>Test du select :</h2>';
$select = new Avion();
$select->selectAvion(3);
var_dump($select);

echo '<hr><h2>Test du insert :</h2>';
$insert = new Avion();
$insert->num_avion = 13;
$insert->type = "PA28";
$insert->taux = 127;
$insert->forfait1 = 1161;
$insert->forfait2 = 0;
$insert->forfait3 = 1387;
$insert->heures_forfait1 = 10;
$insert->heures_forfait2 = 0;
$insert->heures_forfait3 = 10;
$insert->reduction_semaine = 4;
$insert->immatriculation = "PA28 F-GDJF";
$insert->insertAvion();
$insert->selectAvion(13);
var_dump($insert);

echo '<hr><h2>Test du update :</h2>';
$update = new Avion();
$update->selectAvion(13);
$update->num_avion = 14;
$update->immatriculation = 'update';
$update->updateAvion(13);
$update->selectAvion(14);
var_dump($update);

echo '<hr><h2>Test du delete :</h2>';
$delete = new Avion();
$delete->selectAvion(13);
$delete->deleteAvion();
$delete->selectAvion(14);
$delete->deleteAvion();
var_dump($delete);