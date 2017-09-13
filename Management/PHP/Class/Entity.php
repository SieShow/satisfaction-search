<?php 
include_once('DataBaseQuerys.php');
class Profile{

    private $id;
    private $kind;
    private $name;

    function __construct($i, $k){
        $this->id = $i;
        $this->kind = GetTableReference($k);
    }

    function GetId(){
        return $this->id; 
    }

    function GetKind(){
        return $this->kind;
    }

    function GetName(){
        return GetNameFromBD($this->id, $this->kind);
    }
};
?>