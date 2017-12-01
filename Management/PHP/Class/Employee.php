<?php 
include_once 'Entity.php';
include_once '../PHP/DataBaseQuerys.php';

class Employee extends Entity{

    private $note_avarage;
    private $issue_avarage;

    function __construct($i){
        parent::__construct($i);
        $getinfo = LoadDataFrom($i, "employee");
        $this->name = $getinfo["name"];
        $this->note_avarage = $getinfo["note_avarage"];
        $this->issue_avarage = $getinfo["issue_sol_avarage"];
        $this->v11_id = $getinfo["V11_code"];
        $this->visitas = $getinfo["visits"];
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
        LoadHistoric("employee", $this->v11_id);
    }
}
?>