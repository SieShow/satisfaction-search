<?php 
include_once("Entity.php");

class Customer extends Entity{

    private $email;
    private $forms_answered;
    private $tecnical_visits;

    function GetEmails(){
        return GetEmailsFromBD($this->id, $this->kind);
    }
    function GetAnsweredFormsNumber(){

    }
    function Get(){
        
    }
    
}
?>