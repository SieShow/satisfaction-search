<?php 
include_once 'Entity.php';
include_once '../php/DataBaseQuerys.php';

class Customer extends Entity{

    private $email;
    private $forms_respondidos;

    function __construct($i){
        parent::__construct($i);
        $getinfo = LoadDataFrom($i, "customer");
        $this->name = utf8_encode($getinfo["name"]);
        $this->email = utf8_encode($getinfo["emails"]);
        $this->visitas = $getinfo["tecnical_visits"];
        $this->forms_respondidos = $getinfo["forms_answereds"];
        $this->v11_id = $getinfo["V11_ID"];
    }
    public function GetID(){
        return $this->id;
    }
    public function GetName(){
        return $this->name;
    }
    public function GetNote_avarage(){
        return $this->note_avarage;
    }
    public function GetIssue_avarage(){
        return $this->issue_avarage;
    }
    public function GetV11_Code(){
        return $this->v11_id;
    }   
    public function GetTotalOfVisits(){
        return $this->visitas;
    }
    public function LoadHistoric(){
        LoadHistoric("customer", $this->v11_id);
    }
    public function GetEmails(){
        return $this->email;
    }
    public function GetForms_Answereds(){
        return $this->forms_respondidos;
    }
}
?>