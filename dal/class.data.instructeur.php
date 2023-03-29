<?php
require_once "class.data.php";

class Instructeur extends Data{
    
    protected $num_instructeur;
    protected $nom;
    protected $prenom;
    
    public function getInstructeur($num_instructeur){
        $select = $this->db->prepare("SELECT * FROM instructeurs WHERE num_instructeur = :num_instructeur;");
        $select->execute(['num_instructeur' => $num_instructeur]);
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if(is_array($select)) foreach($select as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function getAllInstructeurs(){
        $getAllInstructeurs = $this->db->prepare("SELECT * FROM instructeurs;");
        $getAllInstructeurs->execute();
        return $getAllInstructeurs->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
