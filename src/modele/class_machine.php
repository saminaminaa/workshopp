<?php

class Machine{
    private $db;
    private $insert;
    private $select;
    private $delete;


    public function __construct($db){
        $this->db = $db ;
        $this->insert = $db->prepare("insert into Machine(LibelleMachine) values (:Nom)");   // Étape 2
        $this->select = $db->prepare("select * from Machine");
        $this->delete = $db->prepare("delete from Machine where id=:id");

    }

    public function insert($Nom){ // Étape 3
    $r = true;
    $this->insert->execute(array(':Nom'=>$Nom));
    if ($this->insert->errorCode()!=0){
        print_r($this->insert->errorInfo());
        $r=false;
    }
    return $r;
}
    public function select(){
        $this->select->execute() ;
        if ($this->select->errorCode() !=0){
            print_r($this->select->errorInfo()) ;
        }
        return $this->select->fetchAll() ;
    }


    public function delete($id){
        $r = true;
        $this->delete->execute(array(':id'=>$id));
        if ($this->delete->errorCode()!=0){
            print_r($this->delete->errorInfo());
            $r=false;
        }
        return $r;
    }
}