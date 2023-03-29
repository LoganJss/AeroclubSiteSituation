<?php
include '../dal/class.data.membre.php';
      
echo '<h2>Test du select :</h2>';
$select = new Membre();
$select->selectMembre(3);
var_dump($select);

echo '<hr><h2>Test du insert :</h2>';
$insert = new Membre();
$insert->nom = "Logan";
$insert->prenom = "Josse";
$insert->insertMembre();
$insert->selectMembre(280);
var_dump($insert);

echo '<hr><h2>Test du update :</h2>';
$update = new Membre();
$update->selectMembre(13);
$update->num_avion = 14;
$update->immatriculation = 'update';
$update->updateMembre(13);
$update->selectMembre(14);
var_dump($update);

echo '<hr><h2>Test du delete :</h2>';
$delete = new Membre();
$delete->selectMembre(13);
$delete->deleteMembre();
$delete->selectMembre(14);
$delete->deleteMembre();
var_dump($delete);