<?php
include_once '../php/DataBaseQuerys.php';
include_once 'Employee.php';
include_once 'Customer.php';

class Formulario{

    private $idform;
    private $commentary;
    private $customer;
    private $employee;
    private $evaluation_value;
    private $issue_solve;
    private $request_sent;
    private $request_asnwered;

    function __constructor($id){
        $retono = getDataFrom($id, "form");
        $this->idform = $id;
        $this->commentary = $retorno["commentary"];
        $this->customer = new Customer($retorno["idcustomer"]);
        $this->employee = new Employee($retorno["idemployee"]);
        $this->evaluation_value = $retorno["evaluation_value"];
        $this->issue_solve = $retorno["issue_solve"];
        $this->request_sent = $retorno["request_sent"];
        $this->request_answered["request_answered"];
    }

    public function getIdForm(){
        return $this->idform;
    }

    public function getCommentary(){
        return $this->commentary;
    }

    public function getCustomer(){
        return $this->customer;
    }

    public function getEmployee(){
        return $this->employee;
    }

    public function getEvaluation_solve(){
        return $this->evaluation_value;
    }

    public function getIssue_solve(){
        return $this->issue_solve;
    }

    public function getRequest_Sent(){
        return $this->request_sent;
    }

    public function getResquest_Answered(){
        return $this->request_asnwered;
    }
}
?>