<?php
require_once "class.data.php";

class Avion extends Data{
    
    protected $num_avion;
    protected $type_avion;
    protected $taux;
    protected $forfait1;
    protected $forfait2;
    protected $forfait3;
    protected $heures_forfait1;
    protected $heures_forfait2;
    protected $heures_forfait3;
    protected $reduction_semaine;
    protected $immatriculation;
    protected $description;
    
    public function getAvion($num_avion){
        $select = $this->db->prepare("SELECT * FROM avions WHERE num_avion = :num_avion;");
        $select->execute(['num_avion' => $num_avion]);
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if(is_array($select)) foreach($select as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function getAllAvions(){
        $select = $this->db->prepare("SELECT DISTINCT type_avion, description, image_avion FROM avions;");
        $select->execute();
        $select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $select;
    }
    
}
