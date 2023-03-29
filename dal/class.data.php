<?php

class Data{

    protected $db;
    
    public function __construct(){
        include '../config/database.php';
       
        try{
            $this->db = new PDO("pgsql:host=$host;dbname=$database", $login, $password);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch(Exception $ex){
            die("Erreur !: ".$ex->getMessage()."<br>");
        }
    }

}