<?php
require_once "class.data.php";

class Avion extends Data{
    
    protected $num_avion;
    protected $type;
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
    
    public function __get($name){
        if(isset($this->$name)) return $this->$name;
    }
    
    public function __set($name, $value) {
        if(isset($this->$name) || $this->$name === null) $this->$name = $value;
    }
    
    public function selectAvion($num_avion){
        $select = $this->db->prepare("SELECT * FROM avions WHERE num_avion = :num_avion;");
        $select->execute(['num_avion' => $num_avion]);
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if(is_array($select)) foreach($select as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function insertAvion(){
        $insert = $this->db->prepare("INSERT INTO avions(num_avion, type, taux, forfait1, forfait2, forfait3, heures_forfait1, heures_forfait2, heures_forfait3, reduction_semaine, immatriculation) VALUES (:num_avion, :type, :taux, :forfait1, :forfait2, :forfait3, :heures_forfait1, :heures_forfait2, :heures_forfait3, :reduction_semaine, :immatriculation);");
        $insert->execute([
            'num_avion' => $this->num_avion,
            'type' => $this->type,
            'taux' => $this->taux,
            'forfait1' => $this->forfait1,
            'forfait2' => $this->forfait2,
            'forfait3' => $this->forfait3,
            'heures_forfait1' => $this->heures_forfait1,
            'heures_forfait2' => $this->heures_forfait2,
            'heures_forfait3' => $this->heures_forfait3,
            'reduction_semaine' => $this->reduction_semaine,
            'immatriculation' => $this->immatriculation
        ]);
        $insert = $insert->fetch(PDO::FETCH_ASSOC);
        if(is_array($insert)) foreach($insert as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function updateAvion($num_avion){
        $update = $this->db->prepare("UPDATE avions SET num_avion = :num_avion, type = :type, taux = :taux, forfait1 = :forfait1, forfait2 = :forfait2, forfait3 = :forfait3, heures_forfait1 = :heures_forfait1, heures_forfait2 = :heures_forfait2, heures_forfait3 = :heures_forfait3, reduction_semaine = :reduction_semaine, immatriculation = :immatriculation WHERE num_avion = :exnum_avion;");
        $update->execute([
            'exnum_avion' => $num_avion,
            'num_avion' => $this->num_avion,
            'type' => $this->type,
            'taux' => $this->taux,
            'forfait1' => $this->forfait1,
            'forfait2' => $this->forfait2,
            'forfait3' => $this->forfait3,
            'heures_forfait1' => $this->heures_forfait1,
            'heures_forfait2' => $this->heures_forfait2,
            'heures_forfait3' => $this->heures_forfait3,
            'reduction_semaine' => $this->reduction_semaine,
            'immatriculation' => $this->immatriculation
        ]);
        $update = $update->fetch(PDO::FETCH_ASSOC);
        if(is_array($update)) foreach($update as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function deleteAvion(){
        $delete = $this->db->prepare("DELETE FROM avions WHERE num_avion = :num_avion;");
        $delete->execute(['num_avion' => $this->num_avion]);
    }
    
}
