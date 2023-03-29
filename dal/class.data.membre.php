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
    
    public function insertMembre(){
        $insert = $this->db->prepare("INSERT INTO membres(num_membre, nom, prenom, adresse, code_postal, ville, num_civil, tel, portable, email, commentaire, date_vm, validite_vm, date_sep, validite_sep, num_badge, num_qualif, profession, date_naissance, lieu_naissance, carte_federale, date_attestion, date_theorique_bb, date_theorique_ppla, date_bb, date_ppla, date_entree, membre_actif, membre_inscrit) VALUES (:num_membre, :nom, :prenom, :adresse, :code_postal, :ville, :num_civil, :tel, :portable, :email, :commentaire, :date_vm, :validite_vm, :date_sep, :validite_sep, :num_badge, :num_qualif, :profession, :date_naissance, :lieu_naissance, :carte_federale, :date_attestion, :date_theorique_bb, :date_theorique_ppla, :date_bb, :date_ppla, :date_entree, :membre_actif, :membre_inscrit);");
        $insert->execute([
            'num_membre' => $this->num_membre,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'adresse' => $this->adresse,
            'code_postal' => $this->code_postal,
            'ville' => $this->ville,
            'num_civil' => $this->num_civil,
            'tel' => $this->tel,
            'portable' => $this->portable,
            'email' => $this->email,
            'commentaire' => $this->commentaire,
            'date_vm' => $this->date_vm,
            'validite_vm' => $this->validite_vm,
            'date_sep' => $this->date_sep,
            'validite_sep' => $this->validite_sep,
            'num_badge' => $this->num_badge,
            'num_qualif' => $this->num_qualif,
            'profession' => $this->profession,
            'date_naissance' => $this->date_naissance,
            'lieu_naissance' => $this->lieu_naissance,
            'carte_federale' => $this->carte_federale,
            'date_attestion' => $this->date_attestion,
            'date_theorique_bb' => $this->date_theorique_bb,
            'date_theorique_ppla' => $this->date_theorique_ppla,
            'date_bb' => $this->date_bb,
            'date_ppla' => $this->date_ppla,
            'date_entree' => $this->date_entree,
            'membre_actif' => $this->membre_actif,
            'membre_inscrit' => $this->membre_inscrit
            
        ]);
        $insert = $insert->fetch(PDO::FETCH_ASSOC);
        if(is_array($insert)) foreach($insert as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function updateMembre($num_avion){
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
            'immatriculation' => $this->immatriculation,
        ]);
        $update = $update->fetch(PDO::FETCH_ASSOC);
        if(is_array($update)) foreach($update as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function deleteMembre(){
        $delete = $this->db->prepare("DELETE FROM avions WHERE num_avion = :num_avion;");
        $delete->execute(['num_avion' => $this->num_avion]);
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

    public function agentValide($login){
        $agentValide = $this->db->prepare("SELECT membre_actif FROM membres WHERE login = :login;");
        $agentValide->execute([
            'login' => $login
        ]);
        return $agentValide->fetch()['membre_actif'];
    }
    
}
