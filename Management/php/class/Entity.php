<?php
abstract class Entity{

    private $id;
    private $name;
    private $visitas;
    private $v11_id;

    public abstract function GetID();
    public abstract function GetName();
    public abstract function GetV11_Code(); 
    public abstract function GetTotalOfVisits();
    public abstract function LoadHistoric();
}
?>