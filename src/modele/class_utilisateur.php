<?php

class Utilisateur{
    private $db;
    private $insert;
    private $connect;
    private $selectByEmail;

    public function __construct($db){
        $this->db = $db ;
        $this->insert = $db->prepare("insert into Utilisateur(Email, Password, idRole) values (:email, :mdp, :role)");   // Étape 2
        $this->connect = $db->prepare("select Email, idRole, Password from Utilisateur where email=:email");
        $this->selectByEmail = $db->prepare("select email, idRole from Utilisateur u where email=:email");
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

    public function connect($email){
        $this->connect->execute(array(':email'=>$email));
        if ($this->connect->errorCode()!=0){
            print_r($this->connect->errorInfo());
        }
        return $this->connect->fetch();
    }

    public function selectByEmail($email) {
        $this->selectByEmail->execute(array(':email' => $email));
        if ($this->selectByEmail->errorCode() != 0) {
            print_r($this->selectByEmail->errorInfo());
        }
        return $this->selectByEmail->fetch();
    }


}
?>