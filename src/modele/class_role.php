<?php

class Role{
    
    private $db;
    
    
    private $select;
    
    public function __construct($db){
        
        $this->db = $db ;
        $this->select = $db->prepare("select id, libelle from role r order by libelle");
        
    }
    
         
        
    public function select(){
       $this->select->execute();
       if ($this->select->errorCode()!=0){
           print_r($this->select->errorInfo());
           }
           return $this->select->fetchAll();      
         
     }


}