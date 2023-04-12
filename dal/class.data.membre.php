<?php
require_once "class.data.php";

class Membre extends Data{
    
    protected $num_membre;
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $code_postal;
    protected $ville;
    protected $num_civil;
    protected $tel;
    protected $portable;
    protected $email;
    protected $commentaire;
    protected $date_vm;
    protected $validite_vm;
    protected $date_sep;
    protected $validite_sep;
    protected $num_badge;
    protected $num_qualif;
    protected $profession;
    protected $date_naissance;
    protected $lieu_naissance;
    protected $carte_federale;
    protected $date_attestion;
    protected $date_theorique_bb;
    protected $date_theorique_ppla;
    protected $date_bb;
    protected $date_ppla;
    protected $date_entree;
    protected $membre_actif;
    protected $membre_inscrit;
    protected $date;
    protected $numero_bb;
    protected $date_attestation;
    protected $numera_ppla;
    protected $login;
    protected $password;

    public function selectMembre($num_membre){
        $select = $this->db->prepare("SELECT * FROM membres WHERE num_membre = :num_membre;");
        $select->execute(['num_membre' => $num_membre]);
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if(is_array($select)) foreach($select as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function getMembreByLogin($login){
        $select = $this->db->prepare("SELECT * FROM membres WHERE login = :login;");
        $select->execute([
            'login' => $login
        ]);
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if(is_array($select)) foreach($select as $key => $value){
            $this->$key = $value;
        }
        return $select;
    }
    
    public function loginVerify($login){
        $loginVerify = $this->db->prepare("SELECT login FROM membres WHERE login = :login;");
        $loginVerify->execute([
            'login' => $login
        ]);
        return $loginVerify->rowCount() == 0 ? true : false;
    }
    
    public function getHashpass($login){
        $signinVerify = $this->db->prepare("SELECT password FROM membres WHERE login = :login");
        $signinVerify->execute([
            'login' => $login
        ]);
        return $signinVerify->fetch()['password'];
    }

    public function membreActif($login){
        $agentValide = $this->db->prepare("SELECT membre_actif FROM membres WHERE login = :login;");
        $agentValide->execute([
            'login' => $login
        ]);
        return $agentValide->fetch()['membre_actif'];
    }
    
}
