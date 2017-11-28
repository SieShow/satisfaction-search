<?php
abstract class Entity{

    private $id;
    private $name;
    private $visitas;
    private $v11_id;

    function __construct($i){
        $this->id = $i;
        $this->name = "";
    }
    public abstract function GetID();
    public abstract function GetName();
    public abstract function GetV11_Code(); 
    public abstract function GetTotalOfVisits();
    public abstract function LoadHistoric();
}
?>