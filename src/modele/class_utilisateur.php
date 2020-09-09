<?php

class Utilisateur{
    private $db;
    private $insert;

    public function __construct($db){
        $this->db = $db ;
        $this->insert = $db->prepare("insert into Utilisateur(Email, Password, idRole) values (:email, :mdp, :role)");   // Étape 2

    }

    public function insert($email, $mdp, $role){ // Étape 3
        $r = true;
        $this->insert->execute(array(':email'=>$email, ':mdp'=>$mdp, ':role'=>$role));
        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());
            $r=false;
        }
        return $r;
    }
}
?>